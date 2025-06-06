<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top dauber-navbar">
    <div class="container-fluid">
        <ul class="navbar-nav mr-auto">
            <li class="db-container">
                <span class="icon-home icon-white"></span>
                <a class="navbarText nav-link db-nav-text" href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <li class="db-container">
                <span class="dn-dog"></span>
                <a class="navbarText nav-link db-nav-text" href="{{ route('about') }}">
                    About Log the Dog
                </a>
            </li>
            <li class="db-container">
                <span class="icon-lock icon-white"></span>
                <a class="navbarText nav-link db-nav-text" href="{{ route('privacy') }}">
                    Privacy Policy
                </a>
            </li>
            <li class="db-container">
                <span class="dn-msg"></span>
                <a class="navbarText nav-link db-nav-text" href="{{ route('cactus') }}">
                    Contact Us
                </a>
            </li>
        </ul>
        <ul class="navbar-nav d-flex">
            <li class="nav-item">
                <span class="forceWhite db-nav-text">
                    Welcome,
                    @auth
                        {{ Auth::user()->name }}!
                    @else
                        friend!
                    @endauth
                </span>
            </li>
        </ul>
    </div>
</nav>