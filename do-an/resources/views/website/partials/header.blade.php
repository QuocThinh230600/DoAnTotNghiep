<header>
    <div class="container-fluid">
        <div class="header-banner">
            <div class="container">
                <img class="lozad" data-src="{{$content[1]['image']}}" alt="">
                <div class="content">
                    <p>{!! strip_tags($content[1]['content']) !!}</P>
                </div>
                <div class="hotline">
                    <h6>{!! strip_tags($content[5]['content']) !!} <a href="tel:{!! strip_tags($content[0]['content']) !!}">{!! strip_tags($content[0]['content']) !!}</a></h6>
                </div>
            </div>
        </div>
        <div class="header-mid">
            <div class="container">
                <div class="header-mid__left">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img class="logo-desktop lozad" data-src="{{$content[2]['image']}}" alt="">
                        </a>
                        <a href="{{route('home')}}">
                            <img class="logo-mobile lozad" data-src="{{$content[3]['image']}}" alt="">
                        </a>
                    </div>
                    <div class="search-box">
                        <form method="GET" enctype="multipart/form-data" action="{{ route('search')}}">
                            <input type="text" placeholder="Từ khóa" name="key">
                            <button><img class="lozad" data-src="{{$content[4]['image']}}" alt=""></button>
                        </form>
                    </div>
                </div>
                <div class="header-mid__right">
                    <ul class="header-mid__right-service">
                        <li class="news">
                            <a href="{{route('news')}}">
                                <img class="lozad" data-src="{{$content[6]['image']}}" alt="">
                                <p>{!! strip_tags($content[6]['content']) !!}</p>
                            </a>
                        </li>
                        <li class="support">
                            <a href="javascript:(0)">
                                <img class="lozad" data-src="{{$content[7]['image']}}" alt="">
                                <p>{!! strip_tags($content[7]['content']) !!}</p>
                            </a>
                        </li>
                        <li class="cart">
                            <a href="{{route('cart')}}" id="linkcart" data-href="{{route('getCart')}}">
                                <div class="img">
                                    <img class="lozad" data-src="{{$content[8]['image']}}" alt="gio-hang">
                                    <span class="total-count"></span>
                                </div>
                                <p>{!! strip_tags($content[8]['content']) !!}</p>
                            </a>
                            {{--  <button class="clear-cart btn btn-danger"><i class="icon-x"></i> Xóa giỏ hàng</button>  --}}
                        </li>
                        <li class="menu-hamburger">
                            <span></span>
                            <p>Menu</p>
                        </li>
                    </ul>
                    <div class="menu-mobile">
                        <h6>DANH MỤC SẢN PHẨM</h6>
                        <ul>
                            <li>
                                <a href="{{route('news')}}">
                                    <img class="lozad" data-src="{{asset('website/img/promotion-news.png')}}" alt="Tin tức khuyến mãi">
                                    <span>Tin tức khuyến mãi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('news')}}">
                                    <img class="lozad" data-src="{{asset('website/img/cart.svg')}}" alt="Hướng dẫn mua hàng">
                                    <span>Hướng dẫn mua hàng</span>
                                </a>
                            </li>
                            @foreach ($categorys as $category)
                                <li>
                                    <a href="{{route('category', $category->slug)}}">
                                        <img class="lozad" data-src="{{$category->image}}" alt="">
                                        <span>{{$category->name}}</span>
                                    </a>
                                </li>
                            @endforeach     
                        </ul>
                        <div class="menu-mobile__hotline">
                            <img class="lozad" data-src="{{asset('website/img/phone.svg')}}" alt="">
                            <span>HOTLINE MUA HÀNG <b>1800 1560</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-category">
            <div class="container">
                <ul>
                    @foreach ($categorys as $category)
                        <li>
                            <a href="{{route('category', $category->slug)}}">
                                <img class="lozad" data-src="{{$category->image}}" alt="{{$category->slug}}">
                                <span>{{$category->name}}</span>
                            </a>
                        </li>
                    @endforeach               
                </ul>
            </div>
        </div>
    </div>
</header>