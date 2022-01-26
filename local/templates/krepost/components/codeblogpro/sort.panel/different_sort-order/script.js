
function toggleSelect({
    selectSelector,
   selectActiveClass,
   selectHeaderSelector,
   selectBodySelector,
   selectCurrentSelector}) {
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
       if (e.target && e.target.classList.contains('select__item')) {
           selectCurrent.textContent = e.target.textContent;

           if (selectSelector === '.actions .select') {
               if (selectCurrent.textContent === 'сначала дешёвые') {
                   localStorage.filter = 'ASC';
                   window.location.search = "?sort=catalog_PRICE_1&method=ASC";
               }
               if (selectCurrent.textContent === 'сначала дорогие') {
                   localStorage.filter = 'DESC';
                   window.location.search = "?sort=catalog_PRICE_1&method=DESC";
               }
           }

           tgglSelect();
       }
   });
}

window.onload=function() {
	function setFilterName() {
		const selectCurrent = document.querySelector('.actions .select__current');

		if (window.location.search === '?sort=catalog_PRICE_1&method=ASC' && localStorage.filter === 'ASC') {
			selectCurrent.textContent = 'сначала дешёвые';
		}
	
		if (window.location.search === '?sort=catalog_PRICE_1&method=DESC' && localStorage.filter === 'DESC') {
			selectCurrent.textContent = 'сначала дорогие';
		}
	}

	setFilterName();
}