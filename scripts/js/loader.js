var myVar;

function openBody() {
    myVar = setTimeout(showPage, 15000);
}

function showPage() {
    var loader = document.getElementById("Loader");
    var body = document.getElementById("MainBody");

    loader.classList.add('force-hide');
    loader.classList.add('disappear');
    body.classList.remove('force-hide');
    body.classList.add('appear');
}