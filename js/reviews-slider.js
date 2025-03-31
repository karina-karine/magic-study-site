document.addEventListener('DOMContentLoaded', function () {
    // Отримуємо необхідні елементи
    const reviewsWrapper = document.querySelector('.reviews-wrapper');
    const reviewsGrid = document.querySelector('.reviews-grid');
    const prevButton = document.querySelector('.slider-arrow.prev');
    const nextButton = document.querySelector('.slider-arrow.next');

    // Визначаємо кількість відгуків та поточну сторінку
    const reviewItems = document.querySelectorAll('.review-item');
    let currentPage = 0;
    let itemsPerPage = getItemsPerPage();
    let totalPages = Math.ceil(reviewItems.length / itemsPerPage);

    // Налаштовуємо стилі для горизонтального слайдера
    reviewsGrid.style.display = 'flex';
    reviewsGrid.style.transition = 'transform 0.5s ease';
    reviewsGrid.style.width = '100%';

    // Показуємо всі елементи (вони будуть в одному рядку)
    reviewItems.forEach(item => {
        item.style.display = 'block';
        item.style.flex = `0 0 calc(${100 / itemsPerPage}%)`;
        item.style.boxSizing = 'border-box';
        item.style.padding = '10px';
    });

    // Функція для визначення кількості елементів на сторінці залежно від ширини екрана
    function getItemsPerPage() {
        if (window.innerWidth <= 576) {
            return 1; // 1 елемент для мобільних
        } else if (window.innerWidth <= 992) {
            return 2; // 2 елементи для планшетів
        } else {
            return 3; // 3 елементи для десктопів
        }
    }

    // Функція для оновлення відображення слайдера
    function updateSlider() {
        // Оновлюємо кількість елементів на сторінці
        itemsPerPage = getItemsPerPage();
        totalPages = Math.ceil(reviewItems.length / itemsPerPage);

        // Оновлюємо ширину елементів
        reviewItems.forEach(item => {
            item.style.flex = `0 0 calc(${100 / itemsPerPage}%)`;
        });

        // Перевіряємо, чи поточна сторінка все ще дійсна
        if (currentPage >= totalPages) {
            currentPage = totalPages - 1;
        }

        // Оновлюємо відображення точок
        updateDots();

        // Показуємо відповідні елементи
        showPage(currentPage, false);
    }

    // Функція для показу конкретної сторінки з плавним ковзанням
    function showPage(page, animate = true) {
        // Обчислюємо зсув для поточної сторінки
        const offset = -page * (100 / itemsPerPage) * itemsPerPage;

        // Застосовуємо зсув з анімацією або без
        if (animate) {
            reviewsGrid.style.transition = 'transform 0.5s ease';
        } else {
            reviewsGrid.style.transition = 'none';
        }

        reviewsGrid.style.transform = `translateX(${offset}%)`;
    }

    // Функція для оновлення точок навігації
    function updateDots() {
        // Видаляємо всі існуючі точки
        const dotsContainer = document.querySelector('.reviews-dots');
        dotsContainer.innerHTML = '';

        // Додаємо нові точки відповідно до кількості сторінок
        for (let i = 0; i < totalPages; i++) {
            const dot = document.createElement('span');
            dot.classList.add('dot');
            if (i === currentPage) {
                dot.classList.add('active');
            }

            // Додаємо обробник події для переходу на відповідну сторінку
            dot.addEventListener('click', function () {
                currentPage = i;
                showPage(currentPage);
                updateDots();
            });

            dotsContainer.appendChild(dot);
        }
    }

    // Обробники подій для кнопок з блокуванням швидких кліків
    let isAnimating = false;

    prevButton.addEventListener('click', function () {
        if (currentPage > 0 && !isAnimating) {
            isAnimating = true;
            currentPage--;
            showPage(currentPage);
            updateDots();

            // Розблоковуємо кнопки після завершення анімації
            setTimeout(() => {
                isAnimating = false;
            }, 500);
        }
    });

    nextButton.addEventListener('click', function () {
        if (currentPage < totalPages - 1 && !isAnimating) {
            isAnimating = true;
            currentPage++;
            showPage(currentPage);
            updateDots();

            // Розблоковуємо кнопки після завершення анімації
            setTimeout(() => {
                isAnimating = false;
            }, 500);
        }
    });

    // Додаємо підтримку свайпів для мобільних пристроїв
    let touchStartX = 0;
    let touchEndX = 0;

    reviewsWrapper.addEventListener('touchstart', function (e) {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    reviewsWrapper.addEventListener('touchend', function (e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, { passive: true });

    function handleSwipe() {
        const swipeThreshold = 50;
        if (touchStartX - touchEndX > swipeThreshold && currentPage < totalPages - 1 && !isAnimating) {
            // Свайп вліво - наступний слайд
            isAnimating = true;
            currentPage++;
            showPage(currentPage);
            updateDots();
            setTimeout(() => { isAnimating = false; }, 500);
        } else if (touchEndX - touchStartX > swipeThreshold && currentPage > 0 && !isAnimating) {
            // Свайп вправо - попередній слайд
            isAnimating = true;
            currentPage--;
            showPage(currentPage);
            updateDots();
            setTimeout(() => { isAnimating = false; }, 500);
        }
    }

    // Оновлюємо слайдер при зміні розміру вікна
    window.addEventListener('resize', function () {
        updateSlider();
    });

    // Ініціалізуємо слайдер
    updateSlider();

    // Додаємо обробник події для завершення переходу
    reviewsGrid.addEventListener('transitionend', function () {
        // Можна додати додаткову логіку після завершення анімації
    });
});