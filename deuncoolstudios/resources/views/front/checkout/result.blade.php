@extends('front.layout.master')
@section('title', 'Result')
@section('body')
    
        <!-- Breadcrumb Section Begin  -->

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="/"><i class="fa fa-home"></i>Home</a>
                            <a href="/checkout">Thanh toán</a>
                            <span>Kết quả</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb Section End -->
    
        <!-- Shopping Cart Section Begin -->

        <div class="checkout-section spad">
            <div class="container">
                <div class="col-lg-12">
                    <h4>{{ $notification }}</h4>

                    <a href="/" class="site-btn mt-3" style="display: block; width: fit-content;">Tiếp tục mua hàng</a>

                </div>
            </div>
        </div>

        <!-- Shopping Cart Section End -->

        <!-- Partner Logo Section Begin -->
    
@endsection