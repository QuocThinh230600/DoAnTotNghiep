@if ($metaproducer->banner1 != null)
    <div class="category__banner">
        <div class="category__banner-carousel carousel">
            {{--  @foreach ($images as $image)  --}}
                <div class="carousel-cell">
                    <a href="{{$metaproducer->link1}}">
                        <img class="lozad" data-src="{{$metaproducer->banner1}}" alt="{{$metaproducer->name}}">
                    </a>
                </div>
            {{--  @endforeach  --}}
        </div>
        <div class="category__banner-side">
                @if ($metaproducer->banner2 != null)
                    <a href="{{$metaproducer->link2}}">
                            <img class="lozad" data-src="{{$metaproducer->banner2}}" alt="{{$metaproducer->name}}">
                    </a>
                @endif
                @if ($metaproducer->banner3 != null)
                <a href="{{$metaproducer->link3}}">
                        <img class="lozad" data-src="{{$metaproducer->banner3}}" alt="{{$metaproducer->name}}">
                </a>
                @endif
        </div>
    </div>
@endif
