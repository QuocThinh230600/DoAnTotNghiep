<div class="product__buynow">
    <div class="product__buynow-info">
        <div class="img">
            <img class="lozad" data-src="{{$productDetail->image}}" alt="">
        </div>
        <div class="content">
            <p>{{$productDetail->name}}</p>
            <div class="price">
                @if ($productDetail->discount != null)
                    <span class="price__now">{{number_format($productDetail->discount)}}VNĐ</span>
                    <span class="price__original">{{number_format($productDetail->price)}}VNĐ</span>
                    <span class="price__discount">-{{ceil((($productDetail->price - $productDetail->discount) / $productDetail->price) * 100)}}%</span>
                @else
                    <span class="price__now">{{number_format($productDetail->price)}}VNĐ</span>
                @endif
            </div>
        </div>
    </div>
    <div class="product__buynow-btn">
        <a href="javascrip:(0)" class="buy-btn add-to-cart" data-name="{{$productDetail->name}}" data-price="{{$productDetail->price}}" data-discount="{{$productDetail->discount}}" data-image="{{$productDetail->image}}" data-uuid="{{$productDetail->uuid}}" data-combo="{{$bonusCombojson}}">MUA NGAY</a>
        @if ($productDetail->installment == 2)
            <a href="javascript:;" class="installment-btn">CÓ TRẢ GÓP</a>
        @else
            @if ($productDetail->installment == 3)
                <a href="javascript:;" class="installment-btn">TRẢ GÓP 0%</a>
            @endif
        @endif
        
        
        <a href="javascript:;" class="contact-btn">LIÊN HỆ ĐẶT HÀNG</a>
    </div>
</div>