document.addEventListener('DOMContentLoaded', function () {
    // Мобільне меню
    const hamburger = document.querySelector('.hamburger-menu');
    const mobileMenu = document.querySelector('.mobile-menu-container');
    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', function () {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('active');
            mobileMenu.setAttribute('aria-hidden', expanded);
            document.body.style.overflow = expanded ? '' : 'hidden';
            this.classList.toggle('active');
        });

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.setAttribute('aria-expanded', 'false');
                mobileMenu.classList.remove('active');
                mobileMenu.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
                hamburger.classList.remove('active');
            });
        });
    }

    // Плавна прокрутка до якорів
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href').substring(1);
            const target = document.getElementById(targetId);
            if (target) {
                e.preventDefault();
                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                window.scrollTo({ top: targetPosition, behavior: 'smooth' });
            }
        });
    });

    // Фіксована шапка при прокрутці (з debounce)
    const header = document.querySelector('.header');
    let lastScrollTop = 0;
    let scrollTimeout;
    if (header) {
        window.addEventListener('scroll', () => {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                const scrollTop = window.pageYOffset;
                if (scrollTop > 100) {
                    header.classList.add('header-scrolled');
                    header.classList.toggle('header-hidden', scrollTop > lastScrollTop);
                } else {
                    header.classList.remove('header-scrolled', 'header-hidden');
                }
                lastScrollTop = scrollTop;
            }, 100);
        });
    }

    // Прокрутка до контактної форми
    const contactBtn = document.getElementById('contact-btn');
    if (contactBtn) {
        contactBtn.addEventListener('click', function () {
            document.getElementById('contact-form')?.scrollIntoView({ behavior: 'smooth' });
        });
    }
    // Функція для створення мерехтливих зірок (мєрцалок)
    function createTwinkleStars() {
        const spaceObjects = document.querySelector('.space-objects');
        if (!spaceObjects) return;

        // Створюємо 10 мерехтливих зірок на правій стороні
        for (let i = 0; i < 10; i++) {
            const star = document.createElement('div');
            star.className = 'space-object dynamic-twinkle-star';

            // Розміри більші ніж у звичайних зірок
            const size = Math.random() * 3 + 4;

            // Позиція на правій стороні
            const top = Math.random() * 100;
            const right = Math.random() * 40 + 5;

            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.top = `${top}%`;
            star.style.right = `${right}%`;
            star.style.background = 'white';
            star.style.boxShadow = '0 0 15px 5px rgba(255, 255, 255, 0.9)';
            star.style.position = 'absolute';
            star.style.borderRadius = '50%';

            // Анімація сильного мерехтіння з випадковою затримкою
            const delay = Math.random() * 3;
            star.style.animation = `strongTwinkle ${2 + Math.random() * 2}s ease-in-out infinite ${delay}s`;

            spaceObjects.appendChild(star);
        }
    }

    createTwinkleStars();

    // Обробка відправки форми контактів
    const contactForm = document.getElementById('contactForm');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Показуємо стан завантаження
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="loading-spinner"></span> Відправка...';
            submitBtn.disabled = true;

            const formStatus = document.getElementById('formStatus');

            // ВАЖЛИВО: Отримуємо правильний URL для AJAX-запиту
            // Використовуємо admin-ajax.php URL, який має бути в атрибуті action форми
            const ajaxUrl = this.getAttribute('action');

            console.log('Відправляємо запит на URL:', ajaxUrl); // Для відлагодження

            // Збираємо дані форми
            const formData = new FormData(this);

            // Виводимо дані форми для відлагодження
            for (let pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            // Відправляємо запит
            fetch(ajaxUrl, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            })
                .then(response => {
                    console.log('Статус відповіді:', response.status); // Для відлагодження

                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Отримані дані:', data); // Для відлагодження

                    // Відображаємо повідомлення про статус
                    if (formStatus) {
                        formStatus.style.display = 'block';

                        if (data.success) {
                            formStatus.className = 'form-message success';
                            formStatus.innerHTML = `<h3>${data.data.title}</h3><p>${data.data.message}</p>`;
                            contactForm.reset(); // Очищаємо форму при успіху
                        } else {
                            formStatus.className = 'form-message error';
                            formStatus.innerHTML = `<h3>${data.data.title}</h3><p>${data.data.message}</p>`;
                        }

                        // Прокручуємо до повідомлення
                        formStatus.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }

                    // Відновлюємо кнопку
                    submitBtn.innerHTML = originalBtnText;
                    submitBtn.disabled = false;
                })
                .catch(error => {
                    console.error('Помилка:', error); // Детальна інформація про помилку

                    if (formStatus) {
                        formStatus.style.display = 'block';
                        formStatus.className = 'form-message error';
                        formStatus.innerHTML = '<h3>Помилка відправки</h3><p>Виникла технічна помилка. Будь ласка, спробуйте пізніше або зв\'яжіться з нами через Telegram.</p>';
                    }

                    // Відновлюємо кнопку
                    submitBtn.innerHTML = originalBtnText;
                    submitBtn.disabled = false;
                });
        });
    }
});