$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) $(".top_page").fadeIn();
        else $(".top_page").fadeOut();
    });
    $(".top_page").click(function () {
        $("body,html").animate({ scrollTop: 0 }, "slow");
    });
});

const modalUser = document.querySelector('.js_user');
const modal = document.querySelector('.js_modal');
const modalContent = document.querySelector('.js_modal-content');
const modalClose = document.querySelector('.js_modal-close');


function showTableUser() {
    modalContent.style.transform = "scale(1, 1) rotate(360deg)";
    modalContent.style.opacity = "1";

    modal.classList.add('open');
    // alert('xin chao!')
}

function hideTableUser() {
    modalContent.style.transform = "scale(0, 0) rotate(240deg)";
    modalContent.style.opacity = "0";
    modal.classList.remove('open');

    // modalContent.style.transform = "rotate(0)";
}

modalUser?.addEventListener('click', showTableUser);
modal?.addEventListener('click', hideTableUser);
modalClose?.addEventListener('click', hideTableUser);
modalContent?.addEventListener('click', function (event) {
    event.stopPropagation()
});

//register
const register = document.querySelector('.js-modal_regis');
const backInLogin = document.querySelector('.js-res_login');
const modalRes = document.querySelector('.js_register');
const resContent = document.querySelector('.js_register-content');
const resClose = document.querySelector('.js_register-close');

register?.addEventListener('click', function () {
    modalRes.classList.add('open-res');
    modal.classList.remove('open');

});
backInLogin?.addEventListener('click', function () {
    modal?.classList.add('open');
    modalRes?.classList.remove('open-res');
});
modalRes?.addEventListener('click', function () {
    modalRes.classList.remove('open-res');
});
if (resClose) resClose.addEventListener('click', function () {
    modalRes.classList.remove('open-res');

});
if (resContent) resContent.addEventListener('click', function (event) {
    event.stopPropagation();
})

//avatar 
let avatar = document.querySelector('.avatar');
let info_list = document.querySelector('.list-info');

if (avatar) avatar.addEventListener('click', function (e) {
    this.classList.toggle('show');
})