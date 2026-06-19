<div class="topbar">

    <div class="profile">

        <div class="profile-header">

            <i class='bx bx-user user-icon'></i>

            <div class="profile-text">

                <h4>{{ auth()->user()->name ?? 'Guest' }}</h4>

            </div>

            <i class='bx bx-chevron-down dropdown-icon'></i>

        </div>

        <div class="profile-dropdown">

            <a href="{{ url('/logout') }}">

                <i class='bx bx-log-out'></i>

                Logout

            </a>

        </div>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const profileHeader = document.querySelector('.profile-header');
    const dropdown = document.querySelector('.profile-dropdown');

    if(profileHeader && dropdown){

        profileHeader.addEventListener('click', function () {

            dropdown.classList.toggle('show');

        });

    }

});

</script>