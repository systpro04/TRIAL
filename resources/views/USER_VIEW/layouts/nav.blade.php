<div style="background: teal; border-bottom: 3px solid goldenrod;">
    <nav class="navbar-social">
        <ul>
            <li><a href="https://www.facebook.com"><i class="fas fa-facebook"></i></a></li>
            <li><a href="https://www.youtube.com"><i class="fas fa-youtube"></i></a></li>
            <li><a href="https://www.google.com"><i class="fas fa-google"></i></a></li>
            <li><a href="https://www.tiktok.com"><i class="fas fa-tiktok"></i></a></li>
        </ul>
    </nav>
    <nav class="navbar-contact">
        <ul>
            <li>Contact: +123456789</li>
            <li>Email: example@example.com</li>
        </ul>
    </nav>
</div>

<header id="header" class="header d-flex align-items-center teal-bg">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>Trial and Error<span>.</span></h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('user_home') }}" class="{{ request()->is('home*') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('user_about') }}" class="{{ request()->is('about*') ? 'active' : '' }}">About</a></li>
                <li><a href="#">Services</a></li>
                <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li>
                <li><a href="#">Contact</a></li>
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

.navbar-social a:hover {
    border-bottom: 2px solid goldenrod;
}

.navbar-contact li {
    color: goldenrod;
}

</style>
