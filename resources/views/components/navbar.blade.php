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
            {{-- <li class="db-container">
                <span class="icon-user icon-white"></span>
                <a class="navbarText nav-link db-nav-text" href="{{ route('register') }}">
                    Create an Account
                </a>
            </li> --}}
        </ul>
        <ul class="navbar-nav d-flex">
            <li class="nav-item">
                <div class="forceWhite db-nav-text">
                    @auth
                        <div class="dropdown navbarDropdown">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown">
                                Welcome, {{ Auth::user()->first_name }}!
                            </a>
                            <ul class="dropdown-menu navbarDropdown">
                                <li class="dropdown-item navbarDropdown">
                                    <a href="{{route('profile')}}">Profile</a>
                                </li>
                                <li class="dropdown-item navbarDropdown">
                                    <a href="{{route('logout')}}">Logout</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        Welcome, friend!
                    @endauth
                </div>
            </li>
        </ul>
    </div>
</nav>