function toggleSelect({
    selectSelector,
    selectActiveClass,
    selectHeaderSelector,
    selectBodySelector,
    selectCurrentSelector
}) {
    const select = document.querySelector(selectSelector);
    const selectHeader = document.querySelector(selectHeaderSelector);
    const selectBody = document.querySelector(selectBodySelector);
    const selectCurrent = document.querySelector(selectCurrentSelector);

    function tgglSelect() {
        select.classList.toggle(selectActiveClass);
    }

    selectHeader.addEventListener('click', () => {
        tgglSelect();
    });

    selectBody.addEventListener('click', (e) => {
        if (e.target && e.target.classList.contains('select__link')) {
            selectCurrent.textContent = e.target.textContent;

            switch(selectCurrent.textContent) {
                case 'сначала дешёвые':
                    localStorage.filter = 'сначала дешёвые';
                    break;
                case 'сначала дорогие':
                    localStorage.filter = 'сначала дорогие';
                    break;
                case 'сначала новые':
                    localStorage.filter = 'сначала новые';
                    break;
                case 'сначала старые':
                    localStorage.filter = 'сначала старые';
                    break;
                default:
                    return;
            }

            tgglSelect();
        }
    });
};

window.onload = function () {
    function setFilterName() {
        const selectCurrent = document.querySelector('.actions .select__current');
        const search = window.location.search;

        if (search.includes('?sort=catalog_PRICE_1&order=asc') && localStorage.filter === 'сначала дешёвые') {
            selectCurrent.textContent = 'сначала дешёвые';
        }

        if (search.includes('?sort=catalog_PRICE_1&order=desc') && localStorage.filter === 'сначала дорогие') {
            selectCurrent.textContent = 'сначала дорогие';
        }

        if (search.includes('?sort=created&order=asc') && localStorage.filter === 'сначала новые') {
            selectCurrent.textContent = 'сначала новые';
        }

        if (search.includes('?sort=created&order=desc') && localStorage.filter === 'сначала старые') {
            selectCurrent.textContent = 'сначала старые';
        }
    }

    setFilterName();
};