document.addEventListener('DOMContentLoaded', function() {
    let iconPw = document.querySelector('#icon-Password1');
    let pw = document.querySelector('#password');
    iconPw.addEventListener('click', function() {
        if (iconPw.classList.contains('icon-lock')) {
            iconPw.classList.replace('icon-lock', 'icon-lock-open');
            pw.type = 'text';
        } else {
            iconPw.classList.replace('icon-lock-open', 'icon-lock');
            pw.type = 'password';
        }
    });
});

