@extends('front.layout.master')
@section('title', 'Cart')
@section('body')
    
        <!-- Breadcrumb Section Begin  -->

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="/"><i class="fa fa-home"></i>Home</a>
                            <a href="/shop">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb Section End -->
        
        <!-- Shopping cart Section Begin -->

        <div class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    @if (auth()->user())
                        @if (count($carts)>0)
                        <div class="col-lg-12">
                            <div class="cart-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th class="p-name">Product Name</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th><i class="ti-close" style="cursor: pointer;" onclick="confirm('Xóa tất cả ?') ===true ? window.location='./cart/destroy' : ''"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td class="cart-pic first-row">
                                                    <img style="height:170px;" src="front/img/products/{{ $cart->image }}" alt="">
                                                </td>
                                                <td class="cart-title first-row">
                                                    <h5>{{ $cart->product->name }}</h5>
                                                </td>
                                                @if($cart->size!=null)
                                                    <td class="cart-title first-row">{{$cart->size}}</td>
                                                @else
                                                    <td class="cart-title first-row">default</td>
                                                @endif
                                                <td class="p-price first-row">{{ number_format($cart->price) }}đ</td>
                                                <td class="qua-col first-row">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="text" value="{{ $cart->qty }}" data-rowid="{{'cart-row-' .$cart->id }}" name="" id="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="total-price first-row">
                                                    {{ number_format($cart->price * $cart->qty) }}đ
                                                </td>
                                                <td class="close-td first-row">
                                                    <i class="ti-close" onclick="window.location='./cart/delete/{{ $cart->id }}'"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="cart-buttons">
                                        <a href="/" class="primary-btn continue-shop">Continue Shopping</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 offset-lg-4">
                                    <div class="proceed-checkout">
                                        <ul>
                                            <li class="subtotal">Subtotal <span>{{ $total }}Đ</span></li>
                                            <li class="cart-total">Total <span>{{ $total }}Đ</span></li>
                                        </ul>
                                        <a href="./checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-12">
                            Giỏ hàng của bạn rỗng!!!!!
                        </div>
                        @endif
                    @else
                        @if(Cart::count()>0)
                            <div class="col-lg-12">
                                <div class="cart-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th class="p-name">Product Name</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th><i class="ti-close" style="cursor: pointer;" onclick="confirm('Xóa tất cả ?') ===true ? window.location='./cart/destroy' : ''"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                                <tr>
                                                    <td class="cart-pic first-row">
                                                        <img style="height:170px;" src="front/img/products/{{ $cart->options->images[0]->path }}" alt="">
                                                    </td>
                                                    <td class="cart-title first-row">
                                                        <h5>{{ $cart->name }}</h5>
                                                    </td>
                                                    @if($cart->options->size!=null)
                                                        <td class="cart-title first-row">{{$cart->options->size}}</td>
                                                    @else
                                                        <td class="cart-title first-row">default</td>
                                                    @endif
                                                    <td class="p-price first-row">{{ number_format($cart->price) }}đ</td>
                                                    <td class="qua-col first-row">
                                                        <div class="quantity">
                                                            <div class="pro-qty">
                                                                <input type="text" value="{{ $cart->qty }}" data-rowid="{{ $cart->rowId }}" name="" id="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="total-price first-row">
                                                        {{ number_format($cart->price * $cart->qty) }}đ
                                                    </td>
                                                    <td class="close-td first-row">
                                                        <i class="ti-close" onclick="window.location='./cart/delete/{{ $cart->rowId }}'"></i>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="cart-buttons">
                                            <a href="/" class="primary-btn continue-shop">Continue Shopping</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 offset-lg-4">
                                        <div class="proceed-checkout">
                                            <ul>
                                                <li class="subtotal">Subtotal <span>{{ $total }}Đ</span></li>
                                                <li class="cart-total">Total <span>{{ $total }}Đ</span></li>
                                            </ul>
                                            <a href="./checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-12">
                                Giỏ hàng của bạn rỗng!!!!!
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <!-- Shopping cart Section End -->
    
@endsection