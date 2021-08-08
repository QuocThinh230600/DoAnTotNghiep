<div class="category__product-list" id="show_filter_products">
    <ul id="product_ul">
       @php
           $check =true;
       @endphp
        @foreach ($products as $product)
        @if ($check)
        <li class="category__product-list--highlight">
            <a href="{{route('product', $product->slug)}}">
                <div class="promotion-label">
                    @if ($product->installment == 2)
                        <span class="promotion-item">CÓ TRẢ GÓP</span>
                    @else
                        @if ($product->installment == 3)
                            <span class="promotion-item">TRẢ GÓP 0%</span>
                        @else
                        <span class="promotion-item">MUA NGAY</span>
                        @endif
                    @endif
                </div>
                <div class="img">
                    @if ($product->image != null)
                        <img class="lozad" data-src="{{$product->image}}" alt="">
                    @else
                        <img class="lozad" data-src="{{$config->value}}" alt="">
                    @endif
                </div>
                <div class="hot-deal">
                    @if (strpos($product->featured,'6'))
                        <img class="hot-deal" class="lozad" src="{{asset('website/img/hot-deal.png')}}" alt="">
                    @endif
                </div>
                <div class="info">
                    <div class="name">
                        <span>{{$product->name}}</span>
                    </div>
                    @if ($product->discount != null)
                        <div class="sale-price">
                            <span>{{number_format($product->discount)}}VNĐ</span>
                        </div>
                        <div class="original-price">
                            @if ($product->discount != $product->price)
                                <p>-{{ceil((($product->price - $product->discount) / $product->price) * 100)}}%</p>
                            @endif
                            <span>{{number_format($product->price)}}VNĐ</span>
                        </div>
                    @else
                        <div class="sale-price">
                            <span>{{number_format($product->price)}}VNĐ</span>
                        </div>
                    @endif
                    <div class="rating">
                        <div class="star">
                            {!! showStar($product->review()->where('status','on')->avg('votes')) !!}
                        </div>
                        <div class="count">
                            <span>{{$product->review()->where('status','on')->count()}} đánh giá</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
            @php
                $check=false;
            @endphp
        @else
        <li>
            <a href="{{route('product',$product->slug)}}">
                <div class="promotion-label">
                    @if ($product->installment == 2)
                        <span class="promotion-item">CÓ TRẢ GÓP</span>
                    @else
                        @if ($product->installment == 3)
                            <span class="promotion-item">TRẢ GÓP 0%</span>
                        @else
                        <span class="promotion-item">MUA NGAY</span>
                        @endif
                    @endif
                </div>
                <div class="img">
                    @if ($product->image != null)
                        <img class="lozad" data-src="{{$product->image}}" alt="">
                    @else
                        <img class="lozad" data-src="{{$config->value}}" alt="">
                    @endif 
                </div>
                <div class="hot-deal">
                    @if (strpos($product->featured,'6'))
                        <img class="lozad" data-src="{{asset('website/img/hot-deal.png')}}" alt="">
                    @endif 
                </div>
                <div class="name">
                    <span>{{$product->name}}</span>
                </div>
                @if ($product->discount != null)
                    <div class="sale-price">
                        <span>{{number_format($product->discount)}}VNĐ</span>
                    </div>
                    <div class="original-price">
                        @if ($product->discount != $product->price)
                            <p>-{{ceil((($product->price - $product->discount) / $product->price) * 100)}}%</p>
                        @endif
                        <span>{{number_format($product->price)}}VNĐ</span>
                    </div>
                @else
                    <div class="sale-price">
                        <span>{{number_format($product->price)}}VNĐ</span>
                    </div>
                @endif
                <div class="rating">
                    <div class="star">
                        {!! showStar($product->review()->where('status','on')->avg('votes')) !!}
                    </div>
                    <div class="count">
                        <span>{{$product->review()->where('status','on')->count()}} đánh giá</span>
                    </div>
                </div>
            </a>
        </li>
        @endif
        
        @endforeach  
    </ul>
</div>
<div class="category__product-more">
    <a href="javascript:(0)" id="load_more_product" style="display:{{$countPro<=0 ? 'none' : 'block'}}"
    data-url="{{route('ajax-filter')}}" 
    > XEM THÊM <b id="count_load_more_product">{{$countPro}}</b> SẢN PHẨM</a>
</div>