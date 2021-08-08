<div class="home__category-mobile">
    <div class="container">
        <ul>
            @foreach ($category as $item)
                <li>
                    <a href="{{route('category',$item->slug)}}">
                        <div class="img">
                            <img class="lozad" data-src="{{$item->image_mobile != null ? $item->image_mobile : $item->image}}" alt="">
                        </div>
                        <span>{{$item->name}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>