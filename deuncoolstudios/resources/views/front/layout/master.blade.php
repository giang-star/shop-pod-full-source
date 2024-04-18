<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{ asset('/') }}">
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="front/img/favicon.ico">
    <title>@yield('title') | deuncoolstudios</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
</head>

<body>
    <!-- Start coding here -->

    <!-- Page preloader -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header section Begin -->

    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope">
                            deuncoolstudios@gmail.com
                        </i>
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone">
                            +84 334 496 975
                        </i>
                    </div>
                </div>

                <div class="ht-right">
                    @if (Auth::check())
                    <div class="login-panel manage-account">
                        <img src="front/img/user/{{Auth::user()->avatar ?? '_default-user.png'}}" alt="" class="avatar-account">
                        {{ Auth::user()->first_name }}
                        <ul class="dropdown1">
                            <li><a href="./account/manage">Quản lý tài khoản</a></li>
                            <li><a href="./account/changPassword">Đổi mật khẩu</a></li>
                            <li><a href="./account/logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                    @else
                        <div class="login-panel manage-account">
                            <img src="front/img/user/default.jpg" alt="" class="avatar-account">
                            <a href="./account/login" class="btn">
                                Đăng nhập
                            </a>
                        </div>
                    @endif
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="/">
                                <img src="front/img/logo-deuncool.png" height="25" width="50px" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <form action="shop">
                            <div class="advanced-search">
                                <button type="button" class="category-btn">
                                    All Categories
                                </button>
                                <div class="input-group">
                                    <input type="text" placeholder="What do you need?" name="search" value="{{ request('search') }}">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="./cart">
                                    <i class="icon_bag_alt"></i>
                                    @if(auth()->user())
                                        <span>{{count($carts)}}</span>
                                    @else
                                        <span>{{ Cart::count() }}</span>
                                    @endif
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items" style="overflow: scroll; max-height: 400px;">
                                        <table>
                                            <tbody>
                                                @if (auth()->user())
                                                    @foreach ($carts as $cart)
                                                        <tr>
                                                            <td class="si-pic">
                                                                <img style="height:70px;" src="front/img/products/{{ $cart->image }}" alt="">
                                                            </td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>{{ number_format($cart->price) }} x {{ $cart->qty }}đ</p>
                                                                    <h6>{{ $cart->name }}</h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <i class="ti-close" onclick="window.location='./cart/delete/{{ $cart->rowId }}'"></i>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    @foreach (Cart::content() as $cart)
                                                        <tr>
                                                            <td class="si-pic">
                                                                <img style="height:70px;" src="front/img/products/{{ $cart->options->images[0]->path }}" alt="">
                                                            </td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>{{ number_format($cart->price) }} x {{ $cart->qty }}đ</p>
                                                                    <h6>{{ $cart->name }}</h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <i class="ti-close" onclick="window.location='./cart/delete/{{ $cart->rowId }}'"></i>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        @if (auth()->user())
                                            <h5>{{$total}}đ</h5>
                                        @else
                                            <h5>{{ Cart::total() }}đ</h5>
                                        @endif
                                    </div>
                                    <div class="select-button">
                                        <a href="./cart" class="primary-btn view-card">Xem giỏ hàng</a>
                                        <a href="./checkout" class="primary-btn checkout-btn">Thanh toán</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ (request()->segment(1)=='') ? 'active' : '' }}"><a href="/">Trang chủ</a></li>
                        <li class="{{ (request()->segment(1)=='shop') ? 'active' : '' }}"><a href="./shop">Shop</a></li>
                        <li class="{{ (request()->segment(1)=='blog') ? 'active' : '' }}"><a href="./blog">Bài viết</a></li>
                        <li class="{{ (request()->segment(1)=='contact') ? 'active' : '' }}"><a href="./contact">Liên hệ</a></li>
                        <li><a href="">Trang</a>
                            <ul class="dropdown">
                                <li><a href="./account/my-order">Đơn hàng của tôi</a></li>
                                <li><a href="./cart">Giỏ hàng</a></li>
                                <li><a href="./checkout">Thanh toán</a></li>
                                <li><a href="./register">Đăng kí</a></li>
                                <li><a href="./account/login">Đăng nhập</a></li>
                            </ul>
                        </li>
                    </ul>

                </nav>
                <div id="mobile-menu-wrap">

                </div>
            </div>
        </div>
    </header>

    <!-- Header section End  -->

    {{-- Body start --}}





    @yield('body')




    {{-- Body end --}}
    
    <!-- Partner Logo Section Begin -->

    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin  -->

    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="front/img/logo-deuncool.png" height="30" alt="">
                            </a>
                        </div>
                        <ul>
                            <li>64 Ngõ 59 Mễ Trì, Hà Nội, Việt Nam</li>
                            <li>Phone: 033 449 6975</li>
                            <li>Email: deuncoolstudios@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="/contact">Về chúng tôi</a></li>
                            <li><a href="">Checkout</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Servicius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="">My Account</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Shopping Cart</a></li>
                            <li><a href="">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail update about our latest shop and special offers</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter your email">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright
                            <script>document.write(new Date().getFullYear());</script> All right reserved
                        </div>
                        <div class="payment-pic">
                            <img src="front/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Section End  -->

    <!-- Js Plugins -->
    <script src="front/js/jquery-3.3.1.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery-ui.min.js"></script>
    <script src="front/js/jquery.countdown.min.js"></script>
    <script src="front/js/jquery.nice-select.min.js"></script>
    <script src="front/js/jquery.zoom.min.js"></script>
    <script src="front/js/jquery.dd.min.js"></script>
    <script src="front/js/jquery.slicknav.js"></script>
    <script src="front/js/owl.carousel.min.js"></script>
    <script src="front/js/owlcarousel2-filter.min.js"></script>
    <script src="front/js/main.js"></script>
</body>

</html>