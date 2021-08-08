<div class="home__deal">
    <div class="home__deal-title">
        <h2>GIÁ SỐC MỖI NGÀY</h2>
    </div>
    <div class="home__deal-list">
        <div class="home__deal-title-mobile">
            <h2>GIÁ SỐC MỖI NGÀY</h2>
        </div>
        <div class="deal-carousel carousel">
            @foreach ($ProductSale as $ProSale)
                <div class="carousel-cell">
                    <div class="deal-item">
                        <a href="{{route('product',$ProSale->slug)}}">
                            <div class="promotion-label">
                                @if ($ProSale->installment == 2)
                                    <span class="promotion-item">CÓ TRẢ GÓP</span>
                                @else
                                    @if ($ProSale->installment == 3)
                                        <span class="promotion-item">TRẢ GÓP 0%</span>
                                    @else
                                    <span class="promotion-item">MUA NGAY</span>
                                    @endif
                                @endif
                            </div>
                            <div class="img">
                                @if ($ProSale->image != null)
                                    <img src="{{$ProSale->image}}" alt="{{$ProSale->name}}">
                                @else
                                    <img src="{{$config->value}}" alt="{{$ProSale->name}}">
                                @endif 
                            </div>
                            <div class="hot-deal">
                                @if (strpos($ProSale->featured,'6'))
                                    <img class="lozad" data-src="{{asset('website/img/hot-deal.png')}}" alt="{{$ProSale->name}}">
                                @endif
                            </div>
                            <div class="name">
                                <span>{{$ProSale->name}}</span>
                            </div>
                            @if ($ProSale->discount != null)
                                <div class="sale-price">
                                    <span>{{number_format($ProSale->discount)}}VNĐ</span>
                                </div>
                                <div class="original-price">
                                    @if ($ProSale->discount != $ProSale->price)
                                        <p>-{{ceil((($ProSale->price - $ProSale->discount) / $ProSale->price) * 100)}}%</p>
                                    @endif
                                    <span>{{number_format($ProSale->price)}}VNĐ</span>
                                </div>
                            @else
                                <div class="sale-price">
                                    <span>{{number_format($ProSale->price)}}VNĐ</span>
                                </div>
                            @endif
                            <div class="rating">
                                <div class="star">
                                    {!! showStar($ProSale->review()->where('status','on')->avg('votes')) !!}
                                </div>
                                <div class="count">
                                    <span>{{$ProSale->review()->where('status','on')->count()}} đánh giá</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>