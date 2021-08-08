<div class="category__brand">
    <ul>
        @foreach ($producers as $key => $producer)
            @if ($key < 7)
                <li>
                    <a href="{{route('brand',$producer->slug)}}">
                        <img class="lozad" data-src="{{$producer->image}}" alt="">
                    </a>
                </li>
            @else
                <li>
                    <a class="brand-more-btn">Xem thêm</a>
                </li>
                <li>
                    <a href="{{route('brand',$producer->slug)}}">
                        <img class="lozad" data-src="{{$producer->image}}" alt="">
                    </a>
                </li>
            @endif
        @endforeach
        
       
    </ul>
</div>