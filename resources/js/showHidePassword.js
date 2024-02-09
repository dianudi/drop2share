const showHidePassword = document.querySelector(".show-hide-eye");
showHidePassword &&
    showHidePassword.addEventListener("click", (e) => {
        const elPasswd = document.querySelector('input[id="password"]');
        console.log(elPasswd);
        const state = showHidePassword.classList.contains("bi-eye");
        if (state) {
            showHidePassword.classList.remove("bi-eye");
            showHidePassword.classList.add("bi-eye-slash");
            elPasswd.setAttribute("type", "text");
        } else {
            showHidePassword.classList.remove("bi-eye-slash");
            showHidePassword.classList.add("bi-eye");
            elPasswd.setAttribute("type", "password");
        }
    });
