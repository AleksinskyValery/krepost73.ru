function initSliderWithNavigation({
    slideSelector,
    slideActive,
    buttonSelector,
    buttonActive,
    buttonsParentSelector,
    automatically
}) {
    const slides = document.querySelectorAll(slideSelector);
    const buttons = document.querySelectorAll(buttonSelector);
    const buttonsParent = document.querySelector(buttonsParentSelector);
    let currentSlide = 1;

    console.log(buttons)

    if (buttonsParent) {
        buttonsParent.addEventListener('click', e => {
            if (e.target && e.target.closest(buttonSelector)) {
                buttons.forEach((button, i) => {
                    button.classList.remove(buttonActive);

                    if (e.target === button || e.target.closest(buttonSelector) === button) {
                        currentSlide = i;

                        e.target.closest(buttonSelector).classList.add(buttonActive);

                        slides.forEach(slide => {
                            slide.classList.remove(slideActive);
                            slides[i].classList.add(slideActive);
                        });
                    }
                });
            }
        });
        

        slides[0].classList.add(slideActive);
        buttons[0].classList.add(buttonActive);
    }

    // автоматическое переключение слайдов
    function toggleSlides() {
        if (currentSlide === buttons.length) currentSlide = 0;
        buttons[currentSlide].click();
        currentSlide++;
    }

    if (automatically) setInterval(toggleSlides, 7000);
}

document.addEventListener('DOMContentLoaded', () => {
    initSliderWithNavigation({
        slideSelector: '.wide-slider-section .slider__item',
        slideActive: 'slider__item_active',
        buttonSelector: '.wide-slider-section .slider__nav-btn',
        buttonActive: 'slider__nav-btn_active',
        buttonsParentSelector: '.wide-slider-section .slider__nav-list',
        // automatically: true
    });
});


