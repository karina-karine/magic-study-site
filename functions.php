<?php
// Basic security measures
define('DISALLOW_FILE_EDIT', true); // Disable file editing in admin
define('DISALLOW_UNFILTERED_HTML', true); // Restrict unfiltered HTML

function bez_stresu_security_headers()
{
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('X-Content-Type-Options: nosniff');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: geolocation=(), microphone=(), camera=()');

    // Updated CSP header to allow Web Workers and other necessary resources
    $csp = array(
        "default-src 'self' https: data:",
        "script-src 'self' 'unsafe-inline' 'unsafe-eval' https: blob:",
        "style-src 'self' 'unsafe-inline' https:",
        "img-src 'self' data: https:",
        "connect-src 'self' https:",
        "font-src 'self' https:",
        "worker-src 'self' blob:",
        "frame-src 'self'"
    );

    header("Content-Security-Policy: " . implode('; ', $csp));
}
add_action('send_headers', 'bez_stresu_security_headers');

// Theme setup
function bez_stresu_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));

    register_nav_menus(array(
        'primary' => 'Головне меню',
        'footer' => 'Меню в футері'
    ));
}
add_action('after_setup_theme', 'bez_stresu_setup');

// Enqueue scripts and styles
function bez_stresu_scripts()
{
    // Styles
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', array(), filemtime(get_template_directory() . '/css/style.css'));
    wp_enqueue_style('media-queries', get_template_directory_uri() . '/css/media.css', array(), filemtime(get_template_directory() . '/css/media.css'));

    // Scripts - defer loading for better performance
    wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array('jquery'), '1.0', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);

    // Conditionally load scripts only when needed
    if (is_front_page()) {
        wp_enqueue_script('reviews-slider', get_template_directory_uri() . '/js/reviews-slider.js', array('jquery'), '1.0', true);
    }

    // Add AJAX support for the contact form
    wp_localize_script('main-js', 'ajaxurl', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('contact_form_nonce'),
        'success_message' => 'Дякуємо за вашу заявку! Ми зв\'яжемося з вами найближчим часом.',
        'error_message' => 'На жаль, виникла помилка при відправці заявки. Будь ласка, спробуйте пізніше.'
    ));

    // Add inline script to handle form submission with loading state
    wp_add_inline_script('main-js', '
        document.addEventListener("DOMContentLoaded", function() {
            const contactForm = document.getElementById("contactForm");
            if (contactForm) {
                contactForm.addEventListener("submit", function(e) {
                    const submitBtn = this.querySelector("button[type=submit]");
                    submitBtn.innerHTML = \'<span class="loading-spinner"></span> Відправка...\';
                    submitBtn.disabled = true;
                });
            }
        });
    ');
}
add_action('wp_enqueue_scripts', 'bez_stresu_scripts');

// Schema.org markup
function bez_stresu_schema()
{
    if (is_front_page()) {
        $schema = array(
            "@context" => "https://schema.org",
            "@type" => "EducationalOrganization",
            "name" => get_bloginfo('name'),
            "description" => get_bloginfo('description'),
            "url" => home_url(),
            "telephone" => "+380688367870",
            "foundingDate" => "2018",
            "address" => array(
                "@type" => "PostalAddress",
                "addressCountry" => "UA"
            ),
            "sameAs" => array(
                "https://t.me/MagicStudyUa_manage"
            )
        );

        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>';
    }
}
add_action('wp_head', 'bez_stresu_schema');

// Add SEO meta tags
function bez_stresu_meta_tags()
{
    global $post;

    // Default values
    $description = get_bloginfo('description');
    $keywords = 'допомога студентам, сесія, екзамен, робота';

    if (is_single()) {
        $description = wp_strip_all_tags(get_the_excerpt(), true);
        $keywords = implode(', ', wp_get_post_tags($post->ID, array('fields' => 'names')));
    }

    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";
}
add_action('wp_head', 'bez_stresu_meta_tags', 1);

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Remove WordPress version
remove_action('wp_head', 'wp_generator');

// Disable pingbacks
add_filter('xmlrpc_methods', function ($methods) {
    unset($methods['pingback.ping']);
    return $methods;
});

// Add custom image sizes
add_image_size('review-thumbnail', 300, 200, true);
add_image_size('workflow-icon', 150, 150, false);

// Register custom widget areas
function bez_stresu_widgets_init()
{
    register_sidebar(array(
        'name' => 'Футер віджети',
        'id' => 'footer-widgets',
        'description' => 'Віджети для футера',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'bez_stresu_widgets_init');

// Add lazy loading to images
function bez_stresu_add_lazyload($content)
{
    if (!is_admin()) {
        $content = preg_replace('/<img(.*?)src=/i', '<img$1loading="lazy" src=', $content);
    }
    return $content;
}
add_filter('the_content', 'bez_stresu_add_lazyload');

// Add custom admin page for contact form submissions
function bez_stresu_add_admin_menu()
{
    add_menu_page(
        'Заявки з сайту',
        'Заявки з сайту',
        'manage_options',
        'contact-submissions',
        'bez_stresu_contact_submissions_page',
        'dashicons-email',
        30
    );
}
add_action('admin_menu', 'bez_stresu_add_admin_menu');

/**
 * Функція для відлагодження AJAX-запитів
 */
function debug_ajax_requests()
{
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('AJAX Request: ' . print_r($_REQUEST, true));
    }
}
add_action('admin_init', 'debug_ajax_requests');

/**
 * Перевірка, чи правильно зареєстровані AJAX-хуки
 */
function check_ajax_hooks()
{
    if (defined('WP_DEBUG') && WP_DEBUG) {
        $hooks = array(
            'wp_ajax_contact_form_submission',
            'wp_ajax_nopriv_contact_form_submission'
        );

        foreach ($hooks as $hook) {
            if (has_action($hook)) {
                error_log("AJAX hook $hook is registered correctly.");
            } else {
                error_log("WARNING: AJAX hook $hook is NOT registered!");
            }
        }
    }
}
add_action('init', 'check_ajax_hooks');

/**
 * Функція для обробки відправки форми контактів
 */
function handle_contact_form_submission()
{
    // Логування запиту для відлагодження
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('Contact form submission received: ' . print_r($_POST, true));
    }

    // Встановлюємо правильні заголовки для JSON-відповіді
    header('Content-Type: application/json');

    // Перевірка nonce для безпеки
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'bezstresu_contact_nonce')) {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('Nonce verification failed');
        }

        wp_send_json_error(array(
            'title' => 'Помилка безпеки',
            'message' => 'Перевірка безпеки не пройдена. Будь ласка, оновіть сторінку і спробуйте знову.'
        ));
        die();
    }

    // Отримання та санітизація даних форми
    $name = sanitize_text_field($_POST['name'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $source = sanitize_text_field($_POST['source'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    // Валідація даних
    $errors = array();
    if (empty($name) || strlen($name) < 2) {
        $errors[] = 'Будь ласка, вкажіть коректне ім\'я (мінімум 2 символи)';
    }

    if (empty($phone)) {
        $errors[] = 'Будь ласка, вкажіть ваш контактний номер або Telegram';
    }

    if (empty($source)) {
        $errors[] = 'Будь ласка, вкажіть звідки ви про нас дізнались';
    }

    // Перевірка на спам (honeypot)
    if (!empty($_POST['website'])) {
        // Це, ймовірно, бот, оскільки наше honeypot-поле було заповнено
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('Honeypot field filled - likely a bot');
        }

        wp_send_json_success(array(
            'title' => 'Заявка надіслана успішно!',
            'message' => 'Дякуємо за вашу заявку! Ми зв\'яжемося з вами найближчим часом.'
        ));
        die();
    }

    // Якщо є помилки, повертаємо їх
    if (!empty($errors)) {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('Validation errors: ' . print_r($errors, true));
        }

        wp_send_json_error(array(
            'title' => 'Помилка валідації',
            'message' => implode('<br>', $errors)
        ));
        die();
    }

    // Підготовка вмісту електронного листа
    $to = 'magic.study.uaua@gmail.com';
    $subject = 'Нова заявка з сайту ' . get_bloginfo('name');

    $message_content = '<html><body>';
    $message_content .= '<h2>Нова заявка з сайту</h2>';
    $message_content .= '<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">';
    $message_content .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Ім\'я:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . esc_html($name) . '</td></tr>';
    $message_content .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Контакт:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . esc_html($phone) . '</td></tr>';
    $message_content .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Джерело:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . esc_html($source) . '</td></tr>';

    if (!empty($message)) {
        $message_content .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Повідомлення:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . nl2br(esc_html($message)) . '</td></tr>';
    }

    $message_content .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Дата:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . current_time('d.m.Y H:i') . '</td></tr>';
    $message_content .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>IP:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . sanitize_text_field($_SERVER['REMOTE_ADDR']) . '</td></tr>';
    $message_content .= '</table>';
    $message_content .= '</body></html>';

    // Заголовки електронної пошти
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <wordpress@' . parse_url(home_url(), PHP_URL_HOST) . '>'
    );

    // Відправка електронної пошти
    $sent = wp_mail($to, $subject, $message_content, $headers);

    // Запис у журнал для відстеження помилок
    if (!$sent && defined('WP_DEBUG') && WP_DEBUG) {
        error_log('Email sending failed: ' . print_r($GLOBALS['phpmailer']->ErrorInfo, true));
    }

    // Відповідь клієнту
    if ($sent) {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('Email sent successfully');
        }

        wp_send_json_success(array(
            'title' => 'Заявка надіслана успішно!',
            'message' => 'Дякуємо за вашу заявку! Ми зв\'яжемося з вами найближчим часом.'
        ));
    } else {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('Email sending failed');
        }

        wp_send_json_error(array(
            'title' => 'Помилка відправки',
            'message' => 'На жаль, виникла помилка при відправці заявки. Будь ласка, спробуйте пізніше або зв\'яжіться з нами через Telegram.'
        ));
    }

    die();
}

// Додаємо дії для авторизованих і неавторизованих користувачів
add_action('wp_ajax_contact_form_submission', 'handle_contact_form_submission');
add_action('wp_ajax_nopriv_contact_form_submission', 'handle_contact_form_submission');