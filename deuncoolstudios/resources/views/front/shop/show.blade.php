    @extends('front.layout.master')
    @section('title', 'Product')
    @section('body')
    <!-- Breadcrumb Section Begin  -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                        <a href="shop.html"><i class="fa fa-home"></i>Shop</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb Section End -->

    <!-- Product Shop Section Begin  -->

    <div class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 product-sidebar-filter">
                    @include('front.shop.components.products-sidebar-filter')
                </div> --}}
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img src="front/img/products/{{ $product->productImages[0]->path ?? '' }}" class="product-big-img" alt="">
                                @if ($product->qty<1)
                                    <img src="front/img/products/sold_out.png" class="image-sold-out">
                                @endif
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach ($product->productImages as $image)
                                        <div class="pt active" data-imgbigurl="front/img/products/{{ $image->path ?? '' }}">
                                            <img src="front/img/products/{{ $image->path }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $product->tag }}</span>
                                    <h3>{{ $product->name }}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    @for ($i = 1; $i <=5 ; $i++)
                                        @if ($i<=$avgRating)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif

                                    @endfor
                                    <span>({{ count($product->productComments) }})</span>
                                </div>
                                <div class="pd-desc">
                                    <p>
                                        {{ $product->content }}
                                    </p>
                                    @if ($product->discount!=null)
                                        <h4>{{ number_format($product->discount) }}đ<span>{{ number_format($product->price) }}đ</span></h4>
                                    @else
                                        <h4>{{ number_format($product->price) }}đ</h4>
                                    @endif
                                </div>
                                <form action="/cart/add/{{$product->id}}" method="get">
                                    @csrf
                                    <div class="pd-size-choose">
                                        @foreach (array_unique(array_column($product->productDetails->toArray(), 'size')) as $size)
                                            <div class="sc-item">
                                                <input type="radio" id="sm-{{ $size }}" name="size" value="{{$size}}">
                                                <label for="sm-{{ $size }}" class="{{$loop->index == 0 ? 'active' : ''}}">{{ $size }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if (session('notification'))
                                        <h6 class="alert alert-warning" role="alert">
                                            {{ session('notification') }}
                                        </h6>
                                    @endif
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" name="qty" id="" value="1">
                                        </div>
                                        @if ($product->qty<0)
                                            <div class="primary-btn pd-cart add-to-cart" style="background-color: #8b8888">ADD TO CART</div>
                                        @else
                                            <button type="submit" class="primary-btn pd-cart add-to-cart">ADD TO CART</button>
                                        @endif
                                    </div>
                                </form>
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: {{ $product->productCategory->name }}</li>
                                    <li><span>TAGS</span>: {{ $product->tag }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab col-12">
                        <div class="tab-item">
                            <ul class="nav justify-content-center" role="tablist" >
                                <li><a href="#tab-1" class="active" data-toggle="tab" role="tab">DESCRIPTION</a></li>
                                <li><a href="#tab-2" data-toggle="tab" role="tab">SPECIFICATIONS</a></li>
                                <li><a href="#tab-3" data-toggle="tab" role="tab">Customer Review ({{ count($product->productComments) }})</a></li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">
                                                    Customer Rating
                                                </td>
                                                <td>
                                                    <div class="pd-rating">
                                                        @for ($i = 1; $i <=5 ; $i++)
                                                            @if ($i<=$avgRating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                
                                                        @endfor
                                                        <span>({{ count($product->productComments) }})</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">
                                                    Price
                                                </td>
                                                <td>
                                                    <div class="p-price">
                                                        {{ $product->price }}đ
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">
                                                    ADD TO CART
                                                </td>
                                                <td>
                                                    <div class="cart-add">+add to cart</div>
                                                </td>
    
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">
                                                        {{ $product->qty }} in stock
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">
                                                    Weight
                                                </td>
                                                <td>
                                                    <div class="p-weight">
                                                        {{ $product->weight }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">
                                                        @foreach (array_unique(array_column($product->productDetails->toArray(), 'size')) as $size)
                                                            {{ $size }},
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td><div class="p-code">{{ $product->sku }}</div></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{ count($product->productComments) }} comments</h4>
                                    <div class="comment-option">
                                        @foreach ($product->productComments as $comment)
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="front/img/user/{{ $comment->user->avatar ?? 'default.jpg' }}" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                    <h5>{{ $comment->name }}<span>{{ date('M d, Y', strtotime($comment->created_at)) }}</span></h5>
                                                    <div class="at-reply">{{ $comment->messages }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="leave-comment">
                                        <h4>Leave A Comment</h4>
                                        <form action="" method="post" class="comment-form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}" id="">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? null }}" id="">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <textarea name="messages" placeholder="Message" id="" cols="30" rows="10"></textarea>
                                                    <div class="personal-rating">
                                                        <h6>Your Rating</h6>
                                                        <div class="rate">
                                                            <input type="radio" id="star5" name="rating" value="5" checked/>
                                                            <label for="star5" title="text">5 stars</label>
                                                            <input type="radio" id="star4" name="rating" value="4" />
                                                            <label for="star4" title="text">4 stars</label>
                                                            <input type="radio" id="star3" name="rating" value="3" />
                                                            <label for="star3" title="text">3 stars</label>
                                                            <input type="radio" id="star2" name="rating" value="2" />
                                                            <label for="star2" title="text">2 stars</label>
                                                            <input type="radio" id="star1" name="rating" value="1" />
                                                            <label for="star1" title="text">1 star</label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="site-btn">Send message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Shop Section End -->

    <!-- Related Product Section Begin -->

    <div class="related-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $product)
                    <div class="col-lg-3 col-sm-6">
                        @include('front.components.product-item')
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Related Product Section End -->

    @endsection