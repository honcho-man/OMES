document.querySelector('form').onsubmit = () => {
    var name = document.getElementById('username').value;
    localStorage.setItem('userName', name);

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username == 'admin' && password == 'dashboard') {
        alert('Welcome Admin');
        location.href = "dashboard.html";
    } else if (username !== 'admin' || password !== 'dashboard') {
        alert('you are not an admin');
    }
    return false;

}