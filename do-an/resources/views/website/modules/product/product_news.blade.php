<div class="product__news">
    <div class="product__news-title">
        <p>Tin tức</p>
        <a href="{{route('news')}}">Xem tất cả</a>
    </div>
    <div class="news-list">
        @foreach ($Productnews as $item)
            <div class="news-item">
                <a href="{{route('new_detail',$item->slug)}}">
                    <img class="lozad" data-src="{{$item->image}}" alt="">
                    <p class="title">{!! strip_tags($item->intro) !!}</p>
                </a>
                <div class="tags">
                    <a href="{{route('news')}}">
                        @foreach ($item->category()->get() as $it)
                            @php
                                echo $it->name;
                                break;
                            @endphp
                        @endforeach
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="product__news-more">
        <a href="{{route('news')}}">
            Xem thêm
            <img class="lozad" data-src="{{asset('website/img/down-arrow.svgơ')}}" alt="">
        </a>
    </div>
</div>