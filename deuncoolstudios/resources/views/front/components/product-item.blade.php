<div class="product-item item {{ $product->tag }}">
    <div class="pi-pic" style="position: relative;">
        <img src="front/img/products/{{ $product->productImages[0]->path ?? '' }}" alt="">
        @if ($product->discount!=null)
            <div class="sale">
                Sale off
            </div>
        @endif
        @if ($product->qty<1)
            <img src="front/img/products/sold_out.png" class="image-sold-out" style="right: 5%; width:20%; left:unset">
        @endif
        <ul>
            @if ($product->qty<1)
                <li class="w-icon">
                    <div style="padding: 16px 18px 12px 19px;background-color:rgb(117, 114, 114)">
                        <i class="icon_bag_alt"></i>
                    </div>
                </li>
            @else  
                <li class="w-icon active">
                    <a href="/cart/add/{{ $product->id }}" style="position: relative;">
                        <i class="icon_bag_alt"></i>
                        <div class="tooltip-add-to-cart">Thêm vào giỏ hàng</div>
                    </a>
                </li>
                @endif
            <li class="quick-view">
                <a href="shop/product/{{ $product->id }}">Quick View</a>
            </li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="category-name">
            {{ $product->tag }}
        </div>
        <a href="shop/product/{{ $product->id }}">
            <h5 style="font-weight: 600;">
                {{ $product->name }}
            </h5>
        </a>
        <div class="product-price">
            @if ($product->discount!=null)
                {{ number_format($product->discount) }}đ
                <span>{{ number_format($product->price) }}đ</span>
            @else
                {{ number_format($product->price) }}đ
            @endif
        </div>
    </div>
</div>