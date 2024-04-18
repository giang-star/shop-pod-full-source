@extends('front.layout.master')
@section('title', 'My order')
@section('body')
        <!-- Breadcrumb Section Begin  -->

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="/"><i class="fa fa-home"></i>Trang chủ</a>
                            <span>Chi tiết đơn hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb Section End -->
        
        <!-- Shopping Cart Section Begin -->

        <div class="checkout-section spad">
            <div class="container">
                <div class="checkout-content col-lg-6" style="margin: 0 auto 30px auto;">
                    <a class="content-btn">
                        Mã đơn hàng:
                        <b>#{{ $order->id }}</b>
                    </a>
                </div>
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
                                    <input type="text" name="first_name" id="fir" value="{{ $order->first_name }}" disabled>
                                </div>
                                <div class="col-lg-6">
                                    <label for="last">Tên <span>*</span></label>
                                    <input type="text" name="last_name" id="last" value="{{ $order->last_name }}" disabled>
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun">Quốc tịch <span>*</span></label>
                                    <input type="text" name="country" id="cun" value={{ $order->country }} disabled>
                                </div>
                                <div class="col-lg-12">
                                    <label for="street">Địa chỉ <span>*</span></label>
                                    <input type="text" name="street_address" id="street" class="street-first" value={{ $order->country }} disabled>
                                </div>
                                <div class="col-lg-12">
                                    <label for="town">Thành phố <span>*</span></label>
                                    <input type="text" name="town_city" id="town" value="{{ $order->town_city }}" disabled>
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Địa chỉ email<span>*</span></label>
                                    <input type="text" name="email" id="email" value="{{ $order->email }}" disabled>
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone"><span>Số điện thoại *</span></label>
                                    <input type="text" name="phone" id="phone" value="{{ $order->phone }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="place-order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Sản phẩm <span>Tổng</span></li>
                                        @foreach ($order->orderDetails as $detail)
                                            <li class="fw-normal"><a class="btn" href="/shop/product/{{ $detail->product->id }}">{{ $detail->product->name }} x {{ $detail->qty }}</a> <span>{{ $detail->total }}đ</span></li>
                                        @endforeach
                                        <li class="total-price">Total <span>{{ array_sum(array_column($order->orderDetails->toArray(),'total')) }}đ</span></li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Thanh toán khi nhận hàng
                                                <input disabled type="radio" name="payment_type" id="pc-check" value="pay_later" {{ $order->payment_type == 'pay_later' ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label for="pc-paypal">
                                                Thanh toán online
                                                <input disabled type="radio" name="payment_type" id="pc-paypal" value="online_payment" {{ $order->payment_type == 'online_payment' ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Shopping Cart Section End -->

@endsection