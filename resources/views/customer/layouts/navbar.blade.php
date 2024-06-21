<div class="site-navbar py-2">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <div class="site-logo">
                    <a href="{{ route('home') }}" class="js-logo-clone">Pharma</a>
                </div>
            </div>
            <div class="main-nav d-none d-lg-block">
                <nav class="site-navigation text-right text-md-center" role="navigation">
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('view-products') }}">Store</a></li>
                        <li class="has-children">
                            <a href="#">Dropdown</a>
                            <ul class="dropdown">
                                <li><a href="#">Supplements</a></li>
                                <li class="has-children">
                                    <a href="#">Vitamins</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Supplements</a></li>
                                        <li><a href="#">Vitamins</a></li>
                                        <li><a href="#">Diet &amp; Nutrition</a></li>
                                        <li><a href="#">Tea &amp; Coffee</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Diet &amp; Nutrition</a></li>
                                <li><a href="#">Tea &amp; Coffee</a></li>
                            </ul>
                        </li>
                        {{-- <li><a href="{{ route('about') }}">About</a></li> --}}
                        {{-- <li><a href="{{ route('contact') }}">Contact</a></li> --}}
                    </ul>
                </nav>
            </div>
            <div class="icons d-flex align-items-center">
                <a href="#" class="icons-btn d-inline-block js-search-toggle"><span class="icon-search"></span></a>
                <a href="{{ route('view-cart') }}" class="icons-btn d-inline-block bag">
                    <span class="icon-shopping-bag"></span>
                    <span class="number" id="cart-count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                </a>
                @guest
                    <a href="{{ route('customer.login') }}" class="icons-btn d-inline-block ml-3">
                        <span class="icon-user"></span> Login
                    </a>
                @else
                    <div class="dropdown ml-3">
                        <a href="#" class="icons-btn d-inline-block" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon-user"></span> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
                <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('search-products') }}" method="GET" class="search-form d-none">
            <input type="text" class="form-control" name="query" placeholder="Search keyword and hit enter...">
        </form>
    </div>
</div>

<!-- Add jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.js-search-toggle').on('click', function (e) {
            e.preventDefault();
            $('.search-form').toggleClass('d-none');
        });

        // Optional: Close the search form when clicking outside of it
        $(document).on('click', function (e) {
            if (!$(e.target).closest('.icons-btn, .search-form').length) {
                $('.search-form').addClass('d-none');
            }
        });
    });
</script>

<style>
    .search-form {
        position: absolute;
        top: 60px;
        right: 0;
        width: 300px;
        background: white;
        border: 1px solid #ddd;
        padding: 10px;
        z-index: 1000;
    }
    .icons {
        display: flex;
        align-items: center;
    }
    .icons-btn {
        margin-left: 10px;
        display: flex;
        align-items: center;
    }
    .dropdown-menu {
        min-width: auto;
        padding: 0.5rem;
    }
    .dropdown-item {
        padding: 0.5rem 1rem;
    }
</style>
