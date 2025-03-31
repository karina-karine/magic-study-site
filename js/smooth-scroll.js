document.addEventListener('DOMContentLoaded', function () {
    // Плавна прокрутка для всіх внутрішніх посилань
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');

            // Перевіряємо, чи існує елемент з таким ID
            if (targetId !== '#' && document.querySelector(targetId)) {
                e.preventDefault();

                // Отримуємо висоту шапки для коректного позиціонування
                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetElement = document.querySelector(targetId);
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;

                // Плавна прокрутка до цільового елемента
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Додаємо фокус на елемент для доступності
                targetElement.setAttribute('tabindex', '-1');
                targetElement.focus({ preventScroll: true });

                // Оновлюємо URL без перезавантаження сторінки
                history.pushState(null, null, targetId);
            }
        });
    });

    // Обробка прокрутки сторінки для активації анімацій
    const animateOnScroll = function () {
        const elements = document.querySelectorAll('.advantage-card, .workflow-step, .faq-item');

        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            // Якщо елемент видимий у вікні перегляду
            if (elementPosition < windowHeight - 100) {
                element.classList.add('animate');
            }
        });
    };

    // Запускаємо анімацію при завантаженні сторінки
    animateOnScroll();

    // Запускаємо анімацію при прокрутці
    window.addEventListener('scroll', animateOnScroll);

    // Плавна поява елементів при завантаженні сторінки
    const fadeInElements = document.querySelectorAll('.hero__content, .hero__image, .section-title, .section-description');

    fadeInElements.forEach((element, index) => {
        setTimeout(() => {
            element.classList.add('animate-fade-in');
        }, 100 * index);
    });
});