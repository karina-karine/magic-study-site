<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">

<head>
    <!-- Основні мета-теги -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Preload важливих ресурсів -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" as="style">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/media.css" as="style">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/img/logo.svg" as="image">
    <!-- Основний SEO -->
    <title><?php wp_title('|', true, 'right');
    bloginfo('name'); ?></title>
    <meta name="description"
        content="✓ Професійні консультації та допомога студентам у навчанні. ➤ Досвідчені викладачі ➤ Гарантія якості ➤ Доступні ціни ✎ <?php echo date('Y') - 2018; ?> років досвіду. Звертайтесь!">
    <meta name="keywords"
        content="допомога студентам, консультації з навчання, академічні консультації, допомога з навчанням, консультації студентам, навчальні матеріали">

    <!-- Додаткові мета-теги -->
    <meta name="author" content="<?php bloginfo('name'); ?>">
    <meta name="geo.region" content="UA">
    <meta name="geo.placename" content="Україна">
    <meta name="copyright" content="<?php bloginfo('name'); ?> © <?php echo date('Y'); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#96C93D">

    <!-- Open Graph -->
    <meta property="og:locale" content="uk_UA">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php bloginfo('name'); ?> | Професійна допомога студентам">
    <meta property="og:description"
        content="✓ Професійна допомога студентам. ➤ Досвідчені викладачі ➤ Гарантія якості ➤ Доступні ціни">
    <meta property="og:url" content="<?php echo esc_url(home_url()); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/og-image.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Професійна допомога студентам">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php bloginfo('name'); ?> | Професійна допомога студентам">
    <meta name="twitter:description"
        content="✓ Професійна допомога студентам. ➤ Досвідчені викладачі ➤ Гарантія якості">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/img/og-image.jpg">
    <meta name="twitter:image:alt" content="Професійна допомога студентам">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">

    <!-- Structured Data -->
    <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "EducationalOrganization",
    "name": "<?php bloginfo('name'); ?>",
    "description": "Консультаційний центр для студентів з навчальних питань",
    "url": "<?php echo home_url(); ?>",
    "logo": {
        "@type": "ImageObject",
        "url": "<?php echo get_template_directory_uri(); ?>/img/logo.svg",
        "width": "180",
        "height": "60"
    },
    "foundingDate": "2018",
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "UA",
        "addressRegion": "Україна"
    },
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+380688367870",
        "contactType": "customer service",
        "availableLanguage": ["Ukrainian"]
    },
    "sameAs": [
        "https://t.me/MagicStudyUa_manager"
    ],
    "openingHours": "Mo-Su 09:00-21:00",
    "priceRange": "₴₴"
}
</script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
    <?php wp_body_open(); ?>

    <!-- Пропустити до основного вмісту для доступності -->
    <a href="#main-content" class="skip-to-content">Перейти до основного вмісту</a>

    <header class="header" id="header">
        <div class="container">
            <a href="<?php echo home_url(); ?>" class="logo" aria-label="<?php bloginfo('name'); ?> - На головну">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>"
                    width="40" height="40">
            </a>

            <!-- Десктопна навігація -->
            <nav class="nav-menu" aria-label="Головна навігація">
                <a href="<?php echo home_url('/#why-us'); ?>" class="nav-link">Чому ми</a>
                <a href="<?php echo home_url('/#how-it-works'); ?>" class="nav-link">Як це працює</a>
                <a href="<?php echo home_url('/#reviews'); ?>" class="nav-link">Відгуки</a>
                <a href="<?php echo home_url('/#faq'); ?>" class="nav-link">Часті питання</a>
            </nav>

            <!-- Контактний блок -->
            <div class="contact-block">
                <div class="social-icons">
                    <a href="mailto:Magic.study.uaua@gmail.com" aria-label="Email">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icons/email.png" alt="Email"
                            width="24" height="24">
                    </a>

                    <a href="https://t.me/MagicStudyUa_manager" aria-label="Telegram" target="_blank" rel="noopener">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icons/telegram.png" alt="Telegram"
                            width="24" height="24">
                    </a>
                </div>
                <a href="tel:+380688367870" class="phone" aria-label="Зателефонувати нам">+380 68 836 78 70</a>
                <a href="<?php echo home_url('/#contact-form'); ?>" class="contact-button">Залишити заявку</a>
            </div>

            <!-- Кнопка для мобільного меню -->
            <button class="hamburger-menu" aria-expanded="false" aria-controls="mobile-menu" aria-label="Відкрити меню">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <!-- Мобільне меню -->
        <div class="mobile-menu-container" id="mobile-menu" aria-hidden="true">
            <nav class="mobile-nav-menu" aria-label="Мобільна навігація">
                <a href="<?php echo home_url('/#why-us'); ?>" class="nav-link">Чому ми</a>
                <a href="<?php echo home_url('/#how-it-works'); ?>" class="nav-link">Як це працює</a>
                <a href="<?php echo home_url('/#reviews'); ?>" class="nav-link">Відгуки</a>
                <a href="<?php echo home_url('/#faq'); ?>" class="nav-link">Часті питання</a>
            </nav>

            <div class="mobile-contact-block">
                <div class="social-icons">
                    <a href="mailto:Magic.study.uaua@gmail.com" aria-label="Email">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icons/email.png" alt="Email"
                            width="24" height="24">
                    </a>

                    <a href="https://t.me/MagicStudyUa_manager" aria-label="Telegram" target="_blank" rel="noopener">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icons/telegram.png" alt="Telegram"
                            width="24" height="24">
                    </a>
                </div>
                <a href="tel:+380688367870" class="phone" aria-label="Зателефонувати нам">+380 688 367 870</a>
                <a href="<?php echo home_url('/#contact-form'); ?>" class="contact-button">Залишити заявку</a>
            </div>
        </div>
    </header>