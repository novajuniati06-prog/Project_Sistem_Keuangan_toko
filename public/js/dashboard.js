document.addEventListener('DOMContentLoaded', function () {

    const profileHeader = document.querySelector('.profile-header');
    const dropdown = document.querySelector('.profile-dropdown');

    profileHeader.addEventListener('click', function () {

        dropdown.classList.toggle('show');

    });

});