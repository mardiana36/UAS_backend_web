document.addEventListener('DOMContentLoaded', function() {
    let iconPw = document.querySelector('#icon-Password1');
    let iconPw2 = document.querySelector('#icon-Password2');
    let pw = document.querySelector('#password');
    let pw2 = document.querySelector('#confrimP');
    iconPw.addEventListener('click', function() {
        if (iconPw.classList.contains('icon-lock')) {
            iconPw.classList.replace('icon-lock', 'icon-lock-open');
            pw.type = 'text';
        } else {
            iconPw.classList.replace('icon-lock-open', 'icon-lock');
            pw.type = 'password';
        }
    });

    iconPw2.addEventListener('click', function() {
        if (iconPw2.classList.contains('icon-lock')) {
            iconPw2.classList.replace('icon-lock', 'icon-lock-open');
            pw2.type = 'text';
        } else {
            iconPw2.classList.replace('icon-lock-open', 'icon-lock');
            pw2.type = 'password';
        }
    });
});