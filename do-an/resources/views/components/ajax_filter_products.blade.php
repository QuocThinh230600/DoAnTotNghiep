@if (count($sorts)<=0)
<h1 style="height: 50vh; padding: 40px;">Chưa có sản phẩm . . .</h1>
@else
    @php
        $check=true;
    @endphp
    @foreach ($sorts as $product)
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
                    <img src="{{$product->image}}" alt="{{$product->name}}">
                @else
                    <img src="{{$config->value}}" alt="{{$product->name}}">
                @endif
            </div>
            <div class="hot-deal">
                @if (strpos($product->featured,'6'))
                    <img class="hot-deal" src="{{asset('website/img/hot-deal.png')}}" alt="{{$product->name}}">
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
                <img src="{{$product->image}}" alt="">
            @else
                <img src="{{$config->value}}" alt="">
            @endif 
        </div>
        <div class="hot-deal">
            @if (strpos($product->featured,'6'))
                <img src="{{asset('website/img/hot-deal.png')}}" alt="">
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



@endif