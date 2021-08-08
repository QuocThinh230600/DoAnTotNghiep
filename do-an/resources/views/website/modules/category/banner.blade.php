@if ($category->banner1 != null)
    <div class="category__banner">
        <div class="category__banner-carousel carousel">
            {{--  @foreach ($images as $image)  --}}
            
           
            <div class="carousel-cell">
                <a href="{{$category->link1}}">
                    <img class="lozad" data-src="{{$category->banner1}}" alt="{{$category->banner1}}">
                </a>
            </div>
            <div class="carousel-cell">
                <a href="{{$category->link2}}">
                    <img class="lozad" data-src="{{$category->banner2}}" alt="{{$category->banner2}}">
                </a>
            </div>
            <div class="carousel-cell">
                <a href="{{$category->link3}}">
                    <img class="lozad" data-src="{{$category->banner3}}" alt="{{$category->banner3}}">
                </a>
            </div>
            

            {{-- <div class="carousel-cell">
                <a href="{{$category->link1}}">
                    <img class="lozad" data-src="{{$category->banner1}}" alt="{{$category->name}}">
                </a>
            </div> --}}
            {{--  @endforeach x --}}
        </div>
        <div class="category__banner-side">
            @if ($category->banner2 != null)
                <a href="{{$category->link2}}">
                        <img class="lozad" data-src="{{$category->banner2}}" alt="{{$category->name}}">
                </a>
            @endif
            @if ($category->banner3 != null)
                <a href="{{$category->link3}}">
                        <img class="lozad" data-src="{{$category->banner3}}" alt="{{$category->name}}">
                </a>
            @endif
        </div>
    </div>
@endif
