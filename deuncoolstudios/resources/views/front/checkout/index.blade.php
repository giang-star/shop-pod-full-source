@extends('front.layout.master')
@section('title', 'Checkout')
@section('body')
    
        <!-- Breadcrumb Section Begin  -->

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="/"><i class="fa fa-home"></i>Trang chủ</a>
                            <a href="/shop">Shop</a>
                            <span>Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb Section End -->
    
        <!-- Shopping Cart Section Begin -->

        <div class="checkout-section spad">
            <div class="container">
                @if (auth()->user())
                    @if(count($carts)>0)
                        <form action="" method="post" class="checkout-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>
                                        Chi tiết hóa đơn
                                    </h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="fir">Họ <span>*</span></label>
                                            <input type="text" name="first_name" id="fir" value="{{ Auth::user()->first_name ?? '' }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="last">Tên <span>*</span></label>
                                            <input type="text" name="last_name" id="last" value="{{ Auth::user()->last_name ?? '' }}">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="cun">Quốc tịch <span>*</span></label>
                                            <input type="text" name="country" id="cun">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="street">Địa chỉ <span>*</span></label>
                                            <input type="text" name="street_address" id="street" class="street-first">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="town">Thành phố <span>*</span></label>
                                            <input type="text" name="town_city" id="town" value="{{ Auth::user()->town_city ?? '' }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">Địa chỉ email<span>*</span></label>
                                            <input disabled type="text" name="email" id="email" value="{{ Auth::user()->email ?? '' }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="phone"><span>Số điện thoại *</span></label>
                                            <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone ?? '' }}">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="create-item">
                                                <label for="acc-create">
                                                    Tạo tài khoản?
                                                    <input type="checkbox" name="" id="acc-create">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="place-order">
                                        <h4>Đơn hàng của bạn</h4>
                                        <div class="order-total">
                                            <ul class="order-table">
                                                <li>Product <span>Total</span></li>
                                                @if(auth()->user())
                                                    @foreach ($carts as $cart)
                                                        <li class="fw-normal">{{ $cart->product->name }} x {{ $cart->qty }} <span>{{ number_format($cart->price * $cart->qty) }}đ</span></li>
                                                    @endforeach
                                                @else
                                                    @foreach ($carts as $cart)
                                                        <li class="fw-normal">{{ $cart->name }} x {{ $cart->qty }} <span>{{ number_format($cart->price * $cart->qty) }}đ</span></li>
                                                    @endforeach
                                                @endif
                                                <li class="fw-normal">Total <span>{{ $subtotal }}đ</span></li>
                                                <li class="total-price">Total <span>{{ $total }}đ</span></li>
                                            </ul>
                                            <div class="payment-check">
                                                <div class="pc-item">
                                                    <label for="pc-check">
                                                        Thanh toán khi nhận hàng
                                                        <input type="radio" name="payment_type" id="pc-check" value="pay_later" checked>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="pc-item">
                                                    <label for="pc-paypal">
                                                        Thanh toán online
                                                        <input type="radio" name="payment_type" id="pc-paypal" value="online_payment">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="order-btn">
                                                <button type="submit" class="site-btn place-btn">Place Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="col-lg-12" style="">
                            <h2>Giỏ hàng của bạn trống!!!</h2>
                            <a href="/" class="btn btn-site primary-btn mt-5">Về trang chủ</a>
                        </div>
                    @endif
                @else
                    @if(Cart::count()>0)
                        <form action="" method="post" class="checkout-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout-content">
                                        <a href="/account/login" class="content-btn">Đăng nhập</a>
                                    </div>
                                    <h4>
                                        Chi tiết đơn hàng
                                    </h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="fir">Họ <span>*</span></label>
                                            <input type="text" name="first_name" id="fir" value="{{ Auth::user()->first_name ?? '' }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="last">Tên <span>*</span></label>
                                            <input type="text" name="last_name" id="last" value="{{ Auth::user()->last_name ?? '' }}">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="cun">Quốc tịch <span>*</span></label>
                                            <input type="text" name="country" id="cun">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="street">Địa chỉ <span>*</span></label>
                                            <input type="text" name="street_address" id="street" class="street-first">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="town">Thành phố <span>*</span></label>
                                            <input type="text" name="town_city" id="town" value="{{ Auth::user()->town_city ?? '' }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">Địa chỉ email<span>*</span></label>
                                            <input type="text" name="email" id="email" value="{{ Auth::user()->email ?? '' }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="phone"><span>Số điện thoại *</span></label>
                                            <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone ?? '' }}">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="create-item">
                                                <label for="acc-create">
                                                    Tạo tài khoản?
                                                    <input type="checkbox" name="" id="acc-create">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="place-order">
                                        <h4>Your Order</h4>
                                        <div class="order-total">
                                            <ul class="order-table">
                                                <li>Product <span>Total</span></li>
                                                @if(auth()->user())
                                                    @foreach ($carts as $cart)
                                                        <li class="fw-normal">{{ $cart->product->name }} x {{ $cart->qty }} <span>{{ number_format($cart->price * $cart->qty) }}đ</span></li>
                                                    @endforeach
                                                @else
                                                    @foreach ($carts as $cart)
                                                        <li class="fw-normal">{{ $cart->name }} x {{ $cart->qty }} <span>{{ number_format($cart->price * $cart->qty) }}đ</span></li>
                                                    @endforeach
                                                @endif
                                                <li class="fw-normal">Total <span>{{ $subtotal }}đ</span></li>
                                                <li class="total-price">Total <span>{{ $total }}đ</span></li>
                                            </ul>
                                            <div class="payment-check">
                                                <div class="pc-item">
                                                    <label for="pc-check">
                                                        Pay later
                                                        <input type="radio" name="payment_type" id="pc-check" value="pay_later" checked>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="pc-item">
                                                    <label for="pc-paypal">
                                                        Online payment
                                                        <input type="radio" name="payment_type" id="pc-paypal" value="online_payment">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="order-btn">
                                                <button type="submit" class="site-btn place-btn">Place Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                    <div class="col-lg-12" style="">
                        <h2>Giỏ hàng của bạn trống!!!</h2>
                        <a href="/" class="btn btn-site primary-btn mt-5">Về trang chủ</a>
                    </div>
                    @endif
                @endif
            </div>
        </div>

        <!-- Shopping Cart Section End -->

        <!-- Partner Logo Section Begin -->
    
@endsection