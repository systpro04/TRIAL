<header style="background: teal; border-bottom: 3px solid goldenrod;">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <nav class="navbar-social">
            <ul>
                <li><a href="#"><i class="fas fa-brands fa-facebook"></i></a></li>
                <li><a href="#"><i class="fas fa-brands fa-youtube"></i></a></li>
                <li><a href="#"><i class="fas fa-brands fa-google"></i></a></li>
                <li><a href="#"><i class="fas fa-brands fa-tiktok"></i></a></li>
            </ul>
        </nav>
        <nav class="navbar-contact">
            <ul>
                <li><i class="fas fa-phone-alt"></i> 123456789</li>
                <li><i class="fas fa-envelope"></i> example@example.com</li>
            </ul>
        </nav>
    </div>
</header>

<header id="header" class="header d-flex align-items-center teal-bg">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('images/users/flames.png') }}" alt="">
            <h1>Trial and Error<span>.</span></h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('user_home') }}" class="{{ request()->is('home*') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('user_about') }}" class="{{ request()->is('about*') ? 'active' : '' }}">About Us</a></li>
                <li><a href="{{ route('user_service') }}" class="{{ request()->is('services*') ? 'active' : '' }}">Services</a></li>
                <li class="dropdown"><a href="#" class="{{ request()->is('allnews*', 'allint*', 'alladv*' ) ? 'active' : '' }}" ><span>News and Interruptions</span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{ route('all_news') }}" class="{{ request()->is('allnews*') ? 'active' : '' }}">All News</a></li>
                        <li><a href="{{ route('all_interruptions') }}" class="{{ request()->is('allint*') ? 'active' : '' }}">Interruptions</a></li>
                        <li><a href="{{ route('all_advisories') }}" class="{{ request()->is('alladv*') ? 'active' : '' }}">Advisories</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="{{ request()->is('awards*', 'cores*', 'leaders*', 'history*' ) ? 'active' : '' }}" ><span>More</span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{ route('awards') }}" class="{{ request()->is('awards*') ? 'active' : '' }}">Awards</a></li>
                        <li><a href="{{ route('cores') }}" class="{{ request()->is('cores*') ? 'active' : '' }}">Core Values</a></li>
                        <li><a href="{{ route('leaders') }}" class="{{ request()->is('leaders*') ? 'active' : '' }}">Leaders</a></li>
                        <li><a href="{{ route('history') }}" class="{{ request()->is('history*') ? 'active' : '' }}">History</a></li>
                    </ul>
                </li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header>

<style>
.header {
    position: fixed;
    background-color: transparent;
    width: 100%;
    transition: background-color 0.3s ease-in-out;
}
.header.teal-bg {
    background-color: teal;
    color: white;
}
.navbar-social, .navbar-contact {
    display: inline-block;
    margin: 0;
    padding: 0;

}

.navbar-social ul, .navbar-contact ul {
    list-style: none;
    margin: 0;
    padding: 0;
    
}

.navbar-social li, .navbar-contact li {
    display: inline-block;
    margin-right: 15px;
}

.navbar-social a, .navbar-contact li {
    color: white;
    text-decoration: none;
    padding: 5px 10px;
}

.navbar-contact li {
    color: rgb(255, 255, 255);
}
@media (min-width: 768px) {
    .navbar-social, .navbar-contact {
        display: inline-block;
        margin: 0;
        padding: 0;
    }

    .navbar-social ul, .navbar-contact ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-social li, .navbar-contact li {
        display: inline-block;
        margin-right: 15px;
    }

    .navbar-social a, .navbar-contact li {
        color: white;
        text-decoration: none;
        padding: 5px 10px;
    }

    .navbar-social a:hover {
        border-bottom: 2px solid goldenrod;
    }

    .navbar-contact li {
        color: rgb(255, 255, 255);
    }
}

/* Styles for smaller screens (hide the nav) */
@media (max-width: 767px) {
    .navbar-social, .navbar-contact {
        display: none;
    }
}
</style>
