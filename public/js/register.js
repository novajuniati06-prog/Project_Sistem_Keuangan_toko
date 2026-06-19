const password = document.getElementById('password');
const togglePassword = document.getElementById('togglePassword');

togglePassword.addEventListener('click', () => {

    if(password.type === 'password'){

        password.type = 'text';

        togglePassword.classList.remove('bx-hide');
        togglePassword.classList.add('bx-show');

    }else{

        password.type = 'password';

        togglePassword.classList.remove('bx-show');
        togglePassword.classList.add('bx-hide');
    }

});

const confirmPassword = document.getElementById('confirmPassword');
const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

toggleConfirmPassword.addEventListener('click', () => {

    if(confirmPassword.type === 'password'){

        confirmPassword.type = 'text';

        toggleConfirmPassword.classList.remove('bx-hide');
        toggleConfirmPassword.classList.add('bx-show');

    }else{

        confirmPassword.type = 'password';

        toggleConfirmPassword.classList.remove('bx-show');
        toggleConfirmPassword.classList.add('bx-hide');
    }

});