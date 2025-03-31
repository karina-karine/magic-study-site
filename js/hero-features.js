document.addEventListener('DOMContentLoaded', function () {
    // Функція для створення випадкових зірок
    function createRandomStars() {
        const spaceObjects = document.querySelector('.space-objects');
        if (!spaceObjects) return;

        // Створюємо 60 випадкових зірок (більше на правій стороні)
        for (let i = 0; i < 60; i++) {
            const star = document.createElement('div');
            star.className = 'space-object random-star';

            // Випадкові розміри
            const size = Math.random() * 3 + 1;

            // Позиція - більше зірок на правій стороні
            let top, right;
            if (i < 40) { // 40 зірок на правій стороні
                top = Math.random() * 100;
                right = Math.random() * 50; // Від 0% до 50% від правого краю
            } else {
                top = Math.random() * 100;
                right = Math.random() * 100 - 50; // Решта зірок по всьому екрану
            }

            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.top = `${top}%`;
            star.style.right = `${right}%`;
            star.style.background = 'white';
            star.style.boxShadow = '0 0 10px 2px rgba(255, 255, 255, 0.8)';
            star.style.position = 'absolute';
            star.style.borderRadius = '50%';

            // Анімація мерехтіння з випадковою затримкою
            const delay = Math.random() * 5;
            star.style.animation = `twinkle ${3 + Math.random() * 3}s ease-in-out infinite ${delay}s`;

            spaceObjects.appendChild(star);
        }
    }

    // Функція для створення випадкових падаючих зірок
    function createRandomShootingStar() {
        const spaceObjects = document.querySelector('.space-objects');
        if (!spaceObjects) return;

        const shootingStar = document.createElement('div');
        shootingStar.className = 'space-object random-shooting-star';

        // 80% шанс, що зірка з'явиться на правій стороні
        const isRightSide = Math.random() < 0.8;

        if (isRightSide) {
            // Падаюча зірка на правій стороні
            const topPosition = Math.random() * 70;
            const rightPosition = Math.random() * 40 + 10;

            shootingStar.style.top = `${topPosition}%`;
            shootingStar.style.right = `${rightPosition}%`;
            shootingStar.style.width = '2px';
            shootingStar.style.height = '50px';
            shootingStar.style.background = 'linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1))';
            shootingStar.style.transform = 'rotate(225deg)';

            setTimeout(() => {
                shootingStar.style.transition = 'all 1s linear';
                shootingStar.style.opacity = '1';
                shootingStar.style.transform = 'translateX(100px) translateY(100px) rotate(225deg)';

                setTimeout(() => {
                    shootingStar.style.opacity = '0';
                    setTimeout(() => {
                        shootingStar.remove();
                    }, 1000);
                }, 1000);
            }, 100);
        } else {
            // Падаюча зірка на лівій стороні
            const topPosition = Math.random() * 70;
            const leftPosition = Math.random() * 40 + 10;

            shootingStar.style.top = `${topPosition}%`;
            shootingStar.style.left = `${leftPosition}%`;
            shootingStar.style.width = '2px';
            shootingStar.style.height = '50px';
            shootingStar.style.background = 'linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1))';
            shootingStar.style.transform = 'rotate(45deg)';

            setTimeout(() => {
                shootingStar.style.transition = 'all 1s linear';
                shootingStar.style.opacity = '1';
                shootingStar.style.transform = 'translateX(-100px) translateY(100px) rotate(45deg)';

                setTimeout(() => {
                    shootingStar.style.opacity = '0';
                    setTimeout(() => {
                        shootingStar.remove();
                    }, 1000);
                }, 1000);
            }, 100);
        }

        spaceObjects.appendChild(shootingStar);
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

    // Створюємо зірки при завантаженні
    createRandomStars();
    createTwinkleStars();

    // Запускаємо випадкові падаючі зірки кожні 0.5-2 секунди
    setInterval(() => {
        createRandomShootingStar();
    }, Math.random() * 1500 + 500);

    // Одразу створюємо кілька зірок при завантаженні
    for (let i = 0; i < 12; i++) {
        setTimeout(() => {
            createRandomShootingStar();
        }, i * 300);
    }
});