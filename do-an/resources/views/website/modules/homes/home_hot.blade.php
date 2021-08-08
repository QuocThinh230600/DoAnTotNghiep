@foreach ($cate_pro as $Cpro)
<div class="home__hot">
    <div class="home__hot-header">
        <div class="home__hot-header--title">
            <h6 style="text-transform: uppercase">{{$Cpro->name}} NỔI BẬT</h6>
        </div>
        <div class="home__hot-header--other">
            <ul>
                @php
                    $count = 0;
                @endphp
                @foreach ($cate_all as $cat_all)
                    @if ($cat_all->parent_id==$Cpro->id && $count< 5)
                        <li>
                            <a href="{{route('category',$cat_all->slug )}}">{{$cat_all->name}}</a>
                        </li>   
                        @php
                            $count++;
                        @endphp
                    @endif
                    
                @endforeach
                <li>
                    <a href="{{route('category',$Cpro->slug)}}">xem thêm 
                        <b>
                            @php
                            $AllProduct = DB::table('products')
                            ->leftJoin('category_products', 'products.id', '=', 'category_products.product_id')
                            ->where('category_products.category_id',$Cpro->id)
                            ->where('products.deleted_at','=',null)
                            ->count();
                            
                        @endphp
                          {{$AllProduct}}
                        </b> 
                        sản phẩm
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="home__hot-detail">

        @php
            $FirstProFeatureByIdCat = $Cpro->products()->where('featured','like','%2%')->orderBy('created_at','desc')->take(1);
            $arrID= $FirstProFeatureByIdCat->pluck('products.id');
            $AllProFeatureByIdCat = $Cpro->products()->where('featured','like','%3%')->whereNotIn('products.id',$arrID)->orderBy('created_at','desc')->take(4)->get();
            $check = true;
            // dd($AllProFeatureByIdCat);
        @endphp
        @foreach ($FirstProFeatureByIdCat->get() as $FirstPro)
            <div class="home__hot-detail--main">
                <div class="feature">
                    <div class="img">
                        <a href="{{route('product',$FirstPro->slug)}}">
                            <div class="promotion-label">
                                @if ($FirstPro->value = 'Trả góp 0%')
                                    <span class="promotion-item">TRẢ GÓP 0%</span>
                                @else
                                    <span class="promotion-item">CÓ TRẢ GÓP</span>
                                @endif
                            </div>
                            <div class="product-img">
                                @if ($FirstPro->image != null)
                                    <img class="lozad" data-src="{{$FirstPro->image}}" alt="{{$FirstPro->name}}">
                                @else
                                    <img class="lozad" data-src="{{$config->value}}" alt="{{$FirstPro->name}}">
                                @endif 
                            </div>
                            @if (strpos($FirstPro->featured,'6'))
                            <img class="hot-deal lozad" data-src="{{asset('website/img/hot-deal.png')}}" alt="{{$FirstPro->name}}">
                            @endif
                        </a>
                    </div>
                    
                </div>
                <div class="info">
                    <a href="{{route('product',$FirstPro->slug)}}">
                        <div class="name">
                            <span>{{$FirstPro->name}}</span>
                        </div>
                        @if ($FirstPro->discount != null)
                            <div class="sale-price">
                                <span>{{number_format($FirstPro->discount)}}VNĐ</span>
                            </div>
                            <div class="original-price">
                                @if ($FirstPro->discount != $FirstPro->price)
                                    <p>-{{ceil((($FirstPro->price - $FirstPro->discount) / $FirstPro->price) * 100)}}%</p>
                                @endif
                                <span>{{number_format($FirstPro->price)}}VNĐ</span>
                            </div>
                        @else
                            <div class="sale-price">
                                <span>{{number_format($FirstPro->price)}}VNĐ</span>
                            </div>
                        @endif
                        <div class="rating">
                            <div class="star">
                                {!! showStar($FirstPro->review()->where('status','on')->avg('votes')) !!}
                            </div>
                            <div class="count">
                                <span>{{$FirstPro->review()->where('status','on')->count()}} đánh giá</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        <div class="home__hot-detail--list">
            @foreach ($AllProFeatureByIdCat as $AllPro)
                <div class="hot-item">
                    <a href="{{route('product', $AllPro->slug)}}">
                        <div class="promotion-label">
                            @if ($AllPro->value = 'Trả góp 0%')
                                <span class="promotion-item">TRẢ GÓP 0%</span>
                            @else
                                <span class="promotion-item">CÓ TRẢ GÓP</span>
                            @endif
                        </div>
                        <div class="img">
                            @if ($AllPro->image != null)
                                <img class="lozad" data-src="{{$AllPro->image}}" alt="{{$AllPro->name}}">
                            @else
                                <img class="lozad" data-src="{{$config->value}}" alt="{{$AllPro->name}}">
                            @endif 
                        </div>
                        <div class="hot-deal">
                            @if (strpos($AllPro->featured,'6'))
                                    <img class="lozad" data-src="{{asset('website/img/hot-deal.png')}}" alt="{{$AllPro->name}}">
                                @endif
                        </div>
                        <div class="name">
                            <span>{{$AllPro->name}}</span>
                        </div>
                        @if ($AllPro->discount != null)
                            <div class="sale-price">
                                <span>{{number_format($AllPro->discount)}}VNĐ</span>
                            </div>
                            <div class="original-price">
                                @if ($AllPro->discount != $AllPro->price)
                                    <p>-{{ceil((($AllPro->price - $AllPro->discount) / $AllPro->price) * 100)}}%</p>
                                @endif
                                <span>{{number_format($AllPro->price)}}VNĐ</span>
                            </div>
                        @else
                            <div class="sale-price">
                                <span>{{number_format($AllPro->price)}}VNĐ</span>
                            </div>
                        @endif
                        <div class="rating">
                            <div class="star">
                                {!! showStar($AllPro->review()->where('status','on')->avg('votes')) !!}
                            </div>
                            <div class="count">
                                <span>{{$AllPro->review()->where('status','on')->count()}} đánh giá</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="home__hot-detail--more">
            <a href="{{route('category',$Cpro->slug)}}">Xem tất cả <b>{{$AllProduct}}</b> sản phẩm</a>
        </div>
    </div>
</div>
@endforeach