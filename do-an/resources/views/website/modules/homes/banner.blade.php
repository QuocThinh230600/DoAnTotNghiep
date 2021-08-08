<div class="home__banner">
    <div class="home__banner-top">
        <div class="home__banner-left">
            
                <div class="home__banner-carousel">
                    @foreach ($slide_banner as $item)
                    <div class="carousel-cell">
                        <a href="{{$item->link}}">
                            @if ($item->image != null)
                                <img class="lozad" data-src="{{$item->image}}" alt="{{$item->name}}" height="365px">
                            @else
                                <img class="lozad" data-src="{{$config->value}}" alt="{{$item->name}}">
                            @endif 
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="banner-carousel-nav">
                    @foreach ($slide_banner as $new_home)
                    <div class="carousel-cell">
                        <a href="javascript:(0)" style="text-transform: uppercase">{{$new_home->name}}</a>
                    </div>
                    @endforeach
                </div>
            
        </div>
        <div class="home__banner-right">
            <div class="home__banner-right--ad">
                @foreach ($imagesRight as $imageR2)
                    <a href="{{$imageR2->link}}">
                        @if ($imageR2->image != null)
                            <img class="lozad" data-src="{{$imageR2->image}}" alt="{{$imageR2->name}}">
                        @else
                            <img class="lozad" data-src="{{$config->value}}" alt="{{$imageR2->name}}">
                        @endif 
                    </a>
                @endforeach
            </div>
            <div class="home__banner-right--news">
                <div class="header">
                    <span>TIN KHUYẾN MÃI</span>
                    <a href="{{route('news')}}">Xem thêm..</a>
                </div>
                <ul>
                    @foreach ($newsSale as $newsS)
                        <li>
                            <a href="{{route('new_detail',$newsS->slug)}}">
                                <div class="img">
                                    @if ($newsS->image != null)
                                        <img class="lozad" data-src="{{$newsS->image}}" alt="">
                                    @else
                                        <img class="lozad" data-src="{{$config->value}}" alt="">
                                    @endif 
                                </div>
                                <span>{{$newsS->title}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="home__banner-bottom">
        <a href="{{$imagesHome->link}}">
            @if ($imagesHome->image != null)
                <img class="lozad" data-src="{{$imagesHome->image}}" alt="{{$imagesHome->name}}">
            @else
                <img class="lozad" data-src="{{$config->value}}" alt="{{$imagesHome->name}}">
            @endif 
        </a>
    </div>
</div>