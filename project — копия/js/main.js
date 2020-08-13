//.nav-menu-header_ul
let toggler = document.querySelector('.menu-header_toggler'),
    toggler2 = document.querySelector('.menu-header_toggler_closse'),
    menu = document.querySelector('.nav-menu-header_ul');

    toggler.addEventListener('click',(e)=>{
        menu.classList.toggle("nav-menu-header_close");
        toggler.classList.toggle("clone");
        toggler2.classList.toggle("menu-header_toggler_closse__open");
    });