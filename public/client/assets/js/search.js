const mainApp = document.querySelector('main');


const search = document.querySelector('.js_magnifying-glass');
const wpdMain = document.querySelector('.js_wpd-main');
const wpdMainHeight = wpdMain.offsetHeight;
// console.log([wpdMain]);
// console.log(wpdMainHeight);

const wpdContent = document.querySelector('.js_wpd-content');
const closeSearch = document.querySelector('.js_wpd-close');
const header = document.querySelector('.header');
function showTableSearch() {
    wpdMain.classList.add('open-search');
    header.style.paddingTop = `${wpdMainHeight}px`;
}
function hideTableSearch() {
    wpdMain.classList.remove('open-search');
    header.style.paddingTop = `0`;

}
search.addEventListener('click', showTableSearch);
closeSearch.addEventListener('click', hideTableSearch);
wpdContent.addEventListener('click', function (event) {
    event.stopPropagation()
})
//fixed header
const headerJS = document.querySelector('.js-header');
const wpdHeaderHeight = headerJS.offsetHeight;
// console.log(wpdHeaderHeight);
window.addEventListener('scroll', function (e) {
    let widowScroll = window.pageYOffset;
    if (widowScroll >= wpdHeaderHeight) {
        headerJS.classList.add('fixed');
        mainApp.style.paddingTop = `${wpdHeaderHeight}px`;
    } else {
        headerJS.classList.remove('fixed');
        mainApp.style.paddingTop = `0px`;

    }
})


// nav--mobile 

const iconMenu = document.querySelector('.iconmenu');
const openMobile = document.querySelector('.nav_mobile');
const mobileContainer = document.querySelector('.js_nav_mobile-content');
const mobileClose = document.querySelector('.nav_mobile_close');
function showShoppingCart() {
    openMobile?.classList.add('open_mobile');
    mobileContainer.style.transform = "translateX(0)";

}
function hideShoppingCart() {
    openMobile?.classList.remove('open_mobile');
    if (mobileContainer) mobileContainer.style.transform = "translateX(100%)";

}
iconMenu.addEventListener('click', showShoppingCart);
document.addEventListener('click', function (e) {
    if (!mobileContainer?.contains(e.target) && !e.target.matches('.js_cart i')) {
        hideShoppingCart();
    }
});
mobileClose?.addEventListener('click', hideShoppingCart);