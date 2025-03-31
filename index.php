<?php get_header(); ?>

<main>
    <article>
        <section class="hero" id="hero">
            <div class="space-objects">
                <!-- Існуючі об'єкти -->
                <div class="space-object planet-1"></div>
                <div class="space-object planet-2"></div>
                <div class="space-object planet-3"></div>
                <div class="space-object star-1"></div>
                <div class="space-object star-2"></div>
                <div class="space-object star-3"></div>
                <div class="space-object star-4"></div>
                <div class="space-object star-5"></div>
                <div class="space-object comet comet-1"></div>
                <div class="space-object comet comet-2"></div>
                <div class="space-object comet comet-3"></div>
                <div class="space-object shooting-star shooting-star-1"></div>
                <div class="space-object shooting-star shooting-star-2"></div>
                <div class="space-object shooting-star shooting-star-3"></div>
                <div class="space-object glow glow-1"></div>
                <div class="space-object glow glow-2"></div>
                <div class="space-object glow glow-3"></div>

                <!-- Додаткові зірки на правій стороні -->
                <div class="space-object star star-6"></div>
                <div class="space-object star star-7"></div>
                <div class="space-object star star-8"></div>
                <div class="space-object star star-9"></div>
                <div class="space-object star star-10"></div>
                <div class="space-object star star-11"></div>
                <div class="space-object star star-12"></div>
                <div class="space-object star star-13"></div>
                <div class="space-object star star-14"></div>
                <div class="space-object star star-15"></div>
                <div class="space-object star star-16"></div>
                <div class="space-object star star-17"></div>
                <div class="space-object star star-18"></div>
                <div class="space-object star star-19"></div>
                <div class="space-object star star-20"></div>

                <!-- Додаткові планети на правій стороні -->
                <div class="space-object planet planet-4"></div>
                <div class="space-object planet planet-5"></div>
                <div class="space-object planet planet-6"></div>
                <div class="space-object planet planet-7"></div>
                <div class="space-object planet planet-8"></div>


                <!-- Додаткові світлові ефекти на правій стороні -->
                <div class="space-object glow glow-4"></div>
                <div class="space-object glow glow-5"></div>
                <div class="space-object glow glow-6"></div>
                <div class="space-object glow glow-7"></div>

                <!-- Скупчення зірок на правій стороні -->
                <div class="space-object star-cluster star-cluster-1"></div>
                <div class="space-object star-cluster star-cluster-2"></div>
                <div class="space-object star-cluster star-cluster-3"></div>
            </div>

            <div class="container">
                <div class="hero__content">
                    <h1 class="animate-on-load">
                        <?php echo get_theme_mod('hero_title', 'Допомога студентам в написанні'); ?>
                    </h1>
                    <p class="hero__subtitle animate-on-load">
                        <?php echo get_theme_mod('hero_subtitle', 'З нами вчитись легко та без стресу'); ?>
                    </p>
                    <div class="hero__buttons animate-on-load">
                        <a href="https://t.me/MagicStudyUa_manager" class="btn btn-secondary btn-with-icon"
                            target="_blank" rel="noopener">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons/telegram1.svg"
                                alt="Telegram icon" width="24" height="24">
                            <span>Написати у телеграм</span>
                            <div class="btn-hover-effect"></div>
                        </a>
                        <button id="contact-btn" type="button" class="btn btn-primary btn-with-icon">
                            <span>Залишити заявку</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon-right">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                            <div class="btn-hover-effect"></div>
                        </button>

                    </div>
                </div>
                <div class="hero__image animate-on-load">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/hero/student-space.png"
                        alt="Щасливі студенти" width="600" height="400" loading="lazy" class="floating-animation">
                </div>
            </div>

            <div class="hero-wave">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#F0F5F9" fill-opacity="1"
                        d="M0,192L48,176C96,160,192,128,288,128C384,128,480,160,576,186.7C672,213,768,235,864,224C960,213,1056,171,1152,154.7C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>
        <section class="features" id="features">
            <div class="container">
                <ul class="features__list">
                    <li class="features__item" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons/calendar.svg" alt="Календар"
                                width="60" height="60">
                        </div>
                        <div class="feature-content">
                            <h3>Швидкі терміни</h3>
                            <p>Виконуємо роботи в найкоротші терміни</p>
                        </div>
                        <div class="feature-hover-effect"></div>
                    </li>
                    <li class="features__item" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons/target.svg" alt="Ціль"
                                width="60" height="60">
                        </div>
                        <div class="feature-content">
                            <h3>Висока якість</h3>
                            <p>Гарантуємо високу якість робіт</p>
                        </div>
                        <div class="feature-hover-effect"></div>
                    </li>
                    <li class="features__item" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons/books.svg" alt="Книги"
                                width="60" height="60">
                        </div>
                        <div class="feature-content">
                            <h3>Різні дисципліни</h3>
                            <p>Виконуємо роботи з будь-яких дисциплін</p>
                        </div>
                        <div class="feature-hover-effect"></div>
                    </li>
                    <li class="features__item" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons/document.svg" alt="Документ"
                                width="60" height="60">
                        </div>
                        <div class="feature-content">
                            <h3>Унікальність</h3>
                            <p>Всі роботи проходять перевірку на плагіат</p>
                        </div>
                        <div class="feature-hover-effect"></div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="why-us" id="why-us">
            <div class="container">
                <h2 class="section-title">Чому варто обрати саме нас</h2>
                <p class="section-description">
                    Багаторічний досвід наших виконавців та суворе дотримання дедлайну задачі гарантують якісне
                    виконання. Завдяки індивідуальному ставленню до кожного замовлення - більшість
                    нашихзамовників співпрацюють з нами впродовж декількох років.
                </p>

                <div class="advantages-grid">
                    <div class="advantage-card">
                        <div class="advantage-number">01</div>
                        <h3>Працюємо без вихідних</h3>
                        <p>менеджер постійно на зв'язку з вами</p>
                    </div>

                    <div class="advantage-card">
                        <div class="advantage-number">02</div>
                        <h3>Доступна вартість</h3>
                        <p>Ви отримаєте прорахунок вартості замовлення протягом 30 хвилин. Також можете отримати
                            додаткові знижки та бонуси</p>
                    </div>

                    <div class="advantage-card">
                        <div class="advantage-number">03</div>
                        <h3>Кваліфіковані виконавці</h3>
                        <p>перевірені часом виконавці з досвідом від 5 років</p>
                    </div>

                    <div class="advantage-card">
                        <div class="advantage-number">04</div>
                        <h3>Безкоштовні правки без часових обмежень</h3>
                        <p>на відміну від інших сервісів, ми не ставимо часових обмежень коли ви можете звернутись
                            щодо
                            правок</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="how-it-works" id="how-it-works">
            <div class="container">
                <h2 class="section-title">Як ми працюємо</h2>

                <div class="workflow-grid">
                    <div class="workflow-step">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/workflow/request.svg"
                            alt="Заповнення заявки" width="150" height="150" loading="lazy">
                        <h3>Залишаєте запит</h3>
                        <p>на сайті або пишіть нам в Telegram. Менеджер відпише вам протягом 15 хвилин.</p>
                    </div>

                    <div class="workflow-step">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/workflow/details.svg"
                            alt="Уточнення деталей" width="150" height="150" loading="lazy">
                        <h3>Уточнення всіх деталей та оцінка вартості</h3>
                        <p>Уточнюємо всі деталі та передаємо нашим спеціалістам для ознайомлення і оцінки вартості.
                        </p>
                    </div>

                    <div class="workflow-step">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/workflow/payment.svg"
                            alt="Внесення передоплати" width="150" height="150" loading="lazy">
                        <h3>Внесення передоплати</h3>
                        <p>Після узгодження вартості, вносите передоплату в розмірі 50% і затверджуємо замовлення в
                            роботу.</p>
                    </div>

                    <div class="workflow-step">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/workflow/complete.svg"
                            alt="Готовність замовлення" width="150" height="150" loading="lazy">
                        <h3>Готовність замовлення</h3>
                        <p>По готовності замовлення, менеджер вас про це повідомляє і ви отримуєте своє замовлення.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-form" id="contact-form">
            <div class="container">
                <h2 class="section-title">Залишай заявку чи пиши у Telegram</h2>

                <div class="contact-wrapper">
                    <div class="form-container">
                        <form id="contactForm" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>"
                            method="POST">
                            <input type="hidden" name="action" value="contact_form_submission">
                            <input type="hidden" name="nonce"
                                value="<?php echo wp_create_nonce('bezstresu_contact_nonce'); ?>">

                            <input type="text" name="name" placeholder="Ім'я" required>
                            <input type="text" name="phone" placeholder="Номер телефону або нік Telegram" required>
                            <div class="input-group">
                                <input type="text" name="source" placeholder="Звідки про нас дізнались" required>
                                <div class="info-icon" title="Розкажіть, як ви знайшли нас">ⓘ</div>
                            </div>
                            <textarea name="message" placeholder="Ваше повідомлення (необов'язково)"></textarea>

                            <!-- Honeypot поле для захисту від спаму -->
                            <div style="display:none;">
                                <input type="text" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Залишити заявку
                            </button>

                            <div id="formStatus" class="form-message" style="display: none;"></div>
                        </form>
                    </div>
                    <div class="contacts-info">
                        <div class="contact-content">
                            <h3>Наші контакти</h3>
                            <p class="phone">+380 68 836 78 70</p>
                            <div class="social-links">
                                <a href="https://www.tiktok.com/@magic.study_ua_" class="social-link" target="_blank"
                                    rel="noopener">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/icons/tiktok.svg"
                                        alt="TikTok">
                                    @magic.study_ua_
                                </a>

                                <a href="https://t.me/MagicStudyUa_manager" class="social-link" target="_blank">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/icons/telegram.svg"
                                        alt="Telegram">
                                    @MagicStudyUa_manager
                                </a>
                            </div>
                            <a href="https://t.me/MagicStudyUa_manager" class="btn btn-secondary" target="_blank">
                                Написати у телеграм
                            </a>
                        </div>
                        <div class="contact-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/hero/circle.svg"
                                alt="Декоративне зображення" loading="lazy">
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="reviews" id="reviews">
            <div class="container">
                <h2 class="section-title">Що про нас кажуть</h2>

                <div class="reviews-slider">
                    <button class="slider-arrow prev" aria-label="Попередній відгук">←</button>

                    <div class="reviews-wrapper">
                        <div class="reviews-grid">
                            <?php
                            // Масив з шляхами до зображень відгуків
                            $reviews = array(
                                'review1.jpg',
                                'review2.jpg',
                                'review3.jpg',
                                'review4.jpg',
                                'review5.jpg',
                                'review6.jpg',

                            );

                            // Виводимо кожне зображення
                            foreach ($reviews as $index => $review) {
                                echo '<div class="review-item">';
                                echo '<img src="' . get_template_directory_uri() . '/img/reviews/' . $review . '" 
                                alt="Відгук клієнта №' . ($index + 1) . '" 
                                loading="lazy">';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>

                    <button class="slider-arrow next" aria-label="Наступний відгук">→</button>
                </div>

                <div class="reviews-dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </section>

        <div class="modal" id="imageModal">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <img src="" alt="Перегляд зображення" id="modalImage">
            </div>
        </div>

        <section class="telegram-banner" id="telegram-banner">
            <div class="container">
                <div class="telegram-banner__wrapper">
                    <div class="telegram-banner__content">
                        <h2>Зв'яжіться з нами через Telegram</h2>
                        <a href="https://t.me/MagicStudyUa_manager" class="btn btn-secondary" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons/telegram1.svg"
                                alt="Telegram icon">
                            Написати у телеграм
                        </a>
                    </div>
                    <div class="telegram-banner__images">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/tgbanner/student-left.png"
                            alt="Студент з планшетом" class="student-left" loading="lazy">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/tgbanner/student-right.png"
                            alt="Студентка з телефоном" class="student-right" loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        <section class="faq" id="faq">
            <div class="container">
                <h2 class="section-title">Маємо відповіді на Ваші питання</h2>

                <div class="faq-list">
                    <details class="faq-item">
                        <summary>Як оформити послугу?</summary>
                        <div class="faq-content">
                            <p>Просто заповніть форму на сайті або напишіть нам у Telegram/Viber. Наш менеджер
                                зв’яжеться з вами для
                                уточнення деталей.</p>
                        </div>
                    </details>
                    <details class="faq-item">
                        <summary>Як відбувається оплата?</summary>
                        <div class="faq-content">
                            <p>Оплата здійснюється частинами: передоплата для старту роботи та доплата після її
                                виконання. Оплата проводиться на ФОП рахунок.</p>
                        </div>
                    </details>

                    <details class="faq-item">
                        <summary>Що, якщо викладач попросить внести правки?</summary>
                        <div class="faq-content">
                            <p>Ми вносимо виправлення безкоштовно протягом місяця у будь-якій кількості. Після
                                закінчення гарантійного терміну ми також зробимо всі необхідні виправлення, але за
                                додаткову плату.</p>
                        </div>
                    </details>
                    <details class="faq-item">
                        <summary>Які гарантії ви даєте?</summary>
                        <div class="faq-content">
                            <p>Ми працюємо офіційно, оплати проводяться на ФОП рахунок, також у нас в інстаграм
                                профілі
                                ви можете ознайомитись з відгуками наших клієнтів.</p>
                        </div>
                    </details>
                    <details class="faq-item">
                        <summary>Якою буде унікальність роботи?</summary>
                        <div class="faq-content">
                            <p>Виконуємо роботи з високою унікальністю 80%+</p>
                        </div>
                    </details>
                    <details class="faq-item">
                        <summary>У вас є знижки?</summary>
                        <div class="faq-content">
                            <p>Так, у нас є знижки по реферальній програмі, яка описана на сайті також.</p>
                        </div>
                    </details>

                </div>

                <div class="disclaimer">
                    <h3>Важлива інформація</h3>
                    <p>Наші послуги призначені виключно для навчальних цілей. Ми надаємо консультації, допомогу в
                        дослідженні та
                        зразки для самостійного навчання. Всі матеріали є допоміжними зразками і не призначені для
                        прямого
                        використання в академічних роботах.</p>
                    <p>Команда Magic Study не продає готові наукові роботи та не заохочує плагіат. Ми допомагаємо
                        студентам
                        краще зрозуміти матеріал та розвинути власні навички академічного письма.</p>
                </div>

            </div>
        </section>
    </article>
</main>

<?php get_footer(); ?>