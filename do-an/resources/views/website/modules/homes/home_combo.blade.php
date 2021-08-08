<div class="home__combo">
    <div class="home__combo-title">
        <h2>COMBO HOT</h2>
    </div>
    <div class="home__combo-list">
        <div class="home__combo-more">
            {{-- <a href="category.html">Xem tất cả <img class="lozad" data-src="{{asset('website/img/right-arrow.svg')}}" alt=""></a> --}}
        </div>
        <div class="home__combo-title-mobile"> 
            <h2>COMBO HOT</h2>
            {{-- <a href="category.html">Xem tất cả <img class="lozad" data-src="{{asset('website/img/right-arrow.svg')}}" alt=""></a> --}}
        </div>
        <div class="combo-carousel carousel">
            @foreach ($ProductHotCombo as $ProCombo)
            <div class="carousel-cell">
                <div class="combo-item">
                    <a href="{{route('product', $ProCombo->slug)}}">
                        <div class="promotion-label">
                            @if ($ProCombo->installment == 2)
                                <span class="promotion-item">CÓ TRẢ GÓP</span>
                            @else
                                @if ($ProCombo->installment == 3)
                                    <span class="promotion-item">TRẢ GÓP 0%</span>
                                @else
                                <span class="promotion-item">MUA NGAY</span>
                                @endif
                            @endif
                        </div>
                        <div class="img">
                            @if ($ProCombo->image != null)
                                <img src="{{$ProCombo->image}}" alt="{{$ProCombo->name}}">
                            @else
                                <img src="{{$config->value}}" alt="{{$ProCombo->name}}">
                            @endif 
                        </div>
                        <div class="hot-deal">
                            @if (strpos($ProCombo->featured,'6'))
                                <img class="lozad" data-src="{{asset('website/img/hot-deal.png')}}" alt="{{$ProCombo->name}}">
                            @endif
                        </div>
                        <div class="name">
                            <span>{{$ProCombo->name}}</span>
                        </div>
                        @if ($ProCombo->discount != null)
                            <div class="sale-price">
                                <span>{{number_format($ProCombo->discount)}}VNĐ</span>
                            </div>
                            <div class="original-price">
                                @if ($ProCombo->discount != $ProCombo->price)
                                    <p>-{{ceil((($ProCombo->price - $ProCombo->discount) / $ProCombo->price) * 100)}}%</p>
                                @endif
                                <span>{{number_format($ProCombo->price)}}VNĐ</span>
                            </div>
                        @else
                            <div class="sale-price">
                                <span>{{number_format($ProCombo->price)}}VNĐ</span>
                            </div>
                        @endif
                        <div class="rating">
                            <div class="star">
                                {!! showStar($ProCombo->review()->where('status','on')->avg('votes')) !!}
                            </div>
                            <div class="count">
                                <span>{{$ProCombo->review()->where('status','on')->count()}} đánh giá</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
</div>