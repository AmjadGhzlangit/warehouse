<div class="site-navbar py-2">
    <div class="search-wrap">
        <div class="container">
            <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
            <form action="#" method="post">
                <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
            </form>
        </div>
    </div>

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
{{--                        <li><a href="{{ route('about') }}">About</a></li>--}}
{{--                        <li><a href="{{ route('contact') }}">Contact</a></li>--}}
                    </ul>
                </nav>
            </div>
            <div class="icons">
                <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                <a href="{{ route('view-cart') }}" class="icons-btn d-inline-block bag">
                    <span class="icon-shopping-bag"></span>
                    <span class="number" id="cart-count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                </a>
                <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
            </div>
        </div>
    </div>
</div>

<!-- Move the script outside the navbar container -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.add-to-cart-btn').on('click', function (e) {
            e.preventDefault();
            var productId = $(this).data('id');
            $.ajax({
                url: `/cart/add/${productId}`, // Update the URL to include the product ID
                method: 'get', // Ensure method matches the route definition
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#cart-count').text(response.cart_count);
                    alert(response.message);
                }
            });
        });
    });
</script>
