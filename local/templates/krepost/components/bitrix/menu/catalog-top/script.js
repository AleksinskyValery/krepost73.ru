function toggleHeaderCatalogue({
    catalogueSelector,
   catalogueActiveClass,
   catalogueOpenSelector,
   catalogueOpenActiveClass,
}) {
   const catalogue = document.querySelector(catalogueSelector);
   const catalogueOpenBtn = document.querySelector(catalogueOpenSelector);

   catalogueOpenBtn.addEventListener('click', () => {
       toggleCatalogue();
       toggleOpenBtn();
   });

   function closeCatalogue() {
       catalogue.classList.remove(catalogueActiveClass);
   }

   function toggleCatalogue() {
       catalogue.classList.toggle(catalogueActiveClass);
   }

   function toggleOpenBtn() {
       catalogueOpenBtn.classList.toggle(catalogueOpenActiveClass);
   }

   document.addEventListener('keydown', e => {
       if (e.code === "Escape") {
           closeCatalogue();
       }
   });
}
function toggleTabs({
    tabParentSelector,
    tabHeaderSelector,
   tabHeaderActiveClass,
   tabItemSelector,
   tabItemActiveClass,
   event}) {
   const tabParent = document.querySelector(tabParentSelector);
   const tabHeaders = document.querySelectorAll(tabHeaderSelector);
   const tabItems = document.querySelectorAll(tabItemSelector);

   tabParent.addEventListener(event, e => {
       if (e.target && e.target.closest(tabHeaderSelector)) {
           tabHeaders.forEach((tabHeader, i) => {
               if (e.target === tabHeader || e.target.closest(tabHeaderSelector) === tabHeader) {
                   if (tabHeaderActiveClass) {
                       tabHeaders.forEach(tabItem => {
                           tabItem.classList.remove(tabHeaderActiveClass);
                       })
                       tabHeaders[i].classList.add(tabHeaderActiveClass);
                   }

                   tabItems.forEach(tabItem => {
                       tabItem.classList.remove(tabItemActiveClass);
                   })
                   tabItems[i].classList.add(tabItemActiveClass);
               }
           });
       }
   });
}