function minHeader() {
    var x = document.getElementById("Header");
    var openMenu = document.getElementById("minBtn");

    if (x.classList.contains('display')) {
        x.classList.remove('display');
        x.classList.add('hide');
        x.classList.add('disappear');
        openMenu.classList.add("fa-chevron-down");
        openMenu.classList.remove("fa-chevron-up");
    } else {
        x.classList.add('appear');
        x.classList.add('display');
        x.classList.remove('hide');
        openMenu.classList.remove("fa-chevron-down");
        openMenu.classList.add("fa-chevron-up");
    }
}

function openMenu() {
    var Menu = document.getElementById("Menu");
    var menubtn = document.getElementById("menubtn");

    if (Menu.classList.contains('hide')) {
        Menu.classList.remove('hide');
        Menu.classList.add('display');
        Menu.classList.add('appear');
        menubtn.classList.add("appear");
        menubtn.classList.add("fa-plus");
        menubtn.classList.remove("fa-bars");
    } else {
        Menu.classList.add('disappear');
        Menu.classList.add('hide');
        Menu.classList.remove('display');
        menubtn.classList.add("appear");
        menubtn.classList.remove("fa-plus");
        menubtn.classList.add("fa-bars");
    }
}