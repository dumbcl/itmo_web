const menu_button = document.querySelector('.menu_button');
const menu = document.querySelector('.menu');
const body = document.body;
const a_in_menu = document.querySelectorAll('.a_in_menu');

function closeMenu () {
    menu.classList.remove('active');
    menu_button.classList.remove('active');
    body.classList.remove('lock');
}

menu_button.addEventListener('click', function () {
    if (this.classList.contains('active')) {
        closeMenu();
    } else {
        menu.classList.add('active');
        this.classList.add('active');
        body.classList.add('lock');
    }
});
a_in_menu.forEach(function (item) {
    item.addEventListener('click', function (event) {
        closeMenu();
    });
});
