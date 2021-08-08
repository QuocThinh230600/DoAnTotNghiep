<div class="product__attached-mobile">
    <div class="product__attached-title">
        <span>{!! strip_tags($pageContent[15]['content']) !!}</span>
    </div>
    <div class="product__attached-list">
        <ul>
            @foreach ($productFeatured as $item)
                <li>
                    <a href="{{route('product', $item->slug)}}">
                        <div class="img">
                            <img class="lozad" data-src="{{$item->image}}" alt="">
                        </div>
                        <div class="content">
                            <p>{{$item->name}}</p>
                            <span>{{number_format($item->price)}}VNĐ</span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    {{-- <div class="product__attached-more">
        <a href="">
            Xem thêm
            <img class="lozad" data-src="{{asset('website/img/down-arrow.svg')}}" alt="">
        </a>
    </div> --}}
</div>