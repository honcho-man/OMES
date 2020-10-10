function openNav() {
    var navContn = document.getElementById("SideNavContn");
    var nav = document.getElementById("SideNav");

    if (navContn.classList.contains('pie')) {
        navContn.classList.remove('pie');
        navContn.classList.remove('force-nav-in');
        navContn.classList.add('slide-in-left2');
        navContn.classList.remove('slide-out-left2');
        nav.classList.add('slide-in-left');
        nav.classList.remove('slide-out-left');
    } else {
        navContn.classList.add('pie');
        navContn.classList.add('slide-out-left2');
        nav.classList.remove('slide-in-left');
        nav.classList.add('slide-out-left');
    }
}

function closeNav() {
    openNav();
}