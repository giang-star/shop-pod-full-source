    @extends('front/layout.master')


    @section('title', 'Home')
        

    @section('body')

    <!-- Hero Section Begin -->

    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="front/img/banner/banner-1.jpeg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>
                                Bag, Kid
                            </span>
                            <h1>
                                Black Friday
                            </h1>
                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure assumenda consequuntur
                                accusantium aperiam harum rem, eum sint esse est culpa tempore, blanditiis atque minus
                                suscipit officia doloremque illum quos reiciendis.

                            </p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="front/img/banner/banner-2.jpeg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>
                                Bag, Kid
                            </span>
                            <h1>
                                Black Friday
                            </h1>
                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure assumenda consequuntur
                                accusantium aperiam harum rem, eum sint esse est culpa tempore, blanditiis atque minus
                                suscipit officia doloremque illum quos reiciendis.

                            </p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="front/img/banner/banner-3.jpeg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>
                                Bag, Kid
                            </span>
                            <h1>
                                Black Friday
                            </h1>
                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure assumenda consequuntur
                                accusantium aperiam harum rem, eum sint esse est culpa tempore, blanditiis atque minus
                                suscipit officia doloremque illum quos reiciendis.

                            </p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Section End -->

    <!-- Hero Section Begin -->

    <div class="banner-section spad">
        <div class="contaner-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-1.png" alt="">
                        <a href="/shop/T-Shirt" class="inner-text">
                            <h4>T-Shirt</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-1.jpg" alt="">
                        <a href="/shop/Hoddie" class="inner-text">
                            <h4>Hoddie</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner" style="height:334px;">
                        <img src="front/img/banner-1.png" alt="" style="mheight:334px;">
                        <a href="/shop/Áo khoác nỉ" class="inner-text">
                            <h4>Áo khoác nỉ</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section End -->

    <!-- Women Banner Section Begin -->

    <div class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/t-shirt.jpeg" style="background-position:left;">
                        <h2 style="color: #000;">T-Shrit</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="item active" data-tag="*" data-category="women">All</li>
                            <li class="item" data-tag=".Clothing" data-category="women">Clothing</li>
                            <li class="item" data-tag=".HandBag" data-category="women">HandBag</li>
                            <li class="item" data-tag=".Shoes" data-category="women">Shoes</li>
                            <li class="item" data-tag=".Accessories" data-category="women">Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel women">
                        @foreach ($womenProducts as $product)
                            @include('front.components.product-item',['product'=>$product])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin -->

    <section class="deal-of-week set-bg spad" data-setbg="front/img/time-bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia, quibusdam laborum animi eaque architecto modi! Quibusdam consequatur numquam, harum et nostrum quasi ad quia? Ut nostrum praesentium inventore quisquam sunt?

                    </p>
                    <div class="product-price">
                        100,000đ
                        <span>T-shirt</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>hour</p>
                    </div>
                    <div class="cd-item">
                        <span>10</span>
                        <p>minute</p>
                    </div>
                    <div class="cd-item">
                        <span>23</span>
                        <p>second</p>
                    </div>
                </div>
                <a href="" class="primary-btn">SHOP NOW</a>
            </div>
        </div>
    </section>

    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->

    <div class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <ul>
                                <li class="item active" data-tag="*" data-category="men">All</li>
                                <li class="item" data-tag=".Clothing" data-category="men">Clothing</li>
                                <li class="item" data-tag=".HandBag" data-category="men">HandBag</li>
                                <li class="item" data-tag=".Shoes" data-category="men">Shoes</li>
                                <li class="item" data-tag=".Accessories" data-category="men">Accessories</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel men">
                        @foreach ($menProducts as $product)
                            @include('front.components.product-item',['product'=>$product])
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/hoddie.jpeg">
                        <h2>Hoddie</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Man Banner Section End -->

    <!-- Instagram Section Begin -->

    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="front/img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="">Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="">Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="">Collection</a></h5>
            </div>
        </div> 
        <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="">Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="">Collection</a></h5>
            </div>
        </div>
    </div>

    <!-- Instagram Section End -->


    <!-- Latest Blog Section Begin -->

    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>
                            From The Blog
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-blog">
                            <img src="front/img/blog/{{ $blog->image }}" alt="">
                            <div class="latest-text">
                                <div class="tag-list">
                                    <div class="tag-item">
                                        <i class="fa fa-calendar-o"></i>
                                        {{ date('M d, y',strtotime($blog->created_at)) }}
                                    </div>
                                    <div class="tag-item">
                                        <i class="fa fa-comment-o"></i>
                                        {{ count($blog->blogComments) }}
                                    </div>
                                </div>
                                <a href="/blog/{{$blog->id}}">
                                    <h4>
                                        {{ $blog->title }}  
                                    </h4>
                                </a>
                                <p> {{ $blog->subtitle }}  </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>It good have problems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Blog Section End -->

    <!-- Women Banner Section Begin -->
    <!-- Women Banner Section End -->


    @endsection 