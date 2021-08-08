<div class="row">
    <div class="col-xl-6 product__main">
        <div class="product-carousel carousel">
            
            @php
                $images = [];
                array_push($images,$productDetail->image);
                foreach ($MultiImage as $key => $value) {
                    array_push($images,$value->image);
                }
            @endphp 

            {{-- <div class="carousel-cell">
                <a class="gallery-btn" href="{{$productDetail->image}}" data-fancybox="product-detail-gallery">
                    <img class="lozad" data-src="{{$productDetail->image}}" alt="{{$productDetail->name}}">
                </a>
            </div> --}}
            @if (count($images) != 0)   
                @foreach ($images as $item)
                    <div class="carousel-cell">
                        <a class="gallery-btn" href="{{$item}}"
                            data-fancybox="product-detail-gallery">
                            <img class="lozad" data-src="{{$item}}" alt="{{$item}}">
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="product__main-option">
            <ul>
                <li>
                    <a class="gallery-btn" data-fancybox-trigger="category-detail-gallery"
                        href="javascript:;">
                        <img class="lozad" data-src="{{$pageContent[1]['image']}}" alt="">
                        <p>{!! strip_tags($pageContent[1]['content']) !!} {{count($MultiImage)}} ảnh</p>
                    </a>
                    <div class="fullscreen-gallery">
                        @if (count($MultiImage) != 0)
                            @foreach ($MultiImage as $item)
                                <a data-fancybox="category-detail-gallery" data-thumb="{{$item->image}}"
                                    href="{{$item->image}}">
                                </a>
                            @endforeach
                        @endif
                    </div>
                </li>
                <li>
                    <a class="gallery-btn" data-fancybox-trigger="video-gallery" href="javascript:;">
                        <img class="lozad" data-src="{{$pageContent[2]['image']}}" alt="">
                        <p>{!! strip_tags($pageContent[2]['content']) !!}</p>
                    </a>
                    <div class="fullscreen-gallery">
                        <a data-fancybox="video-gallery"
                            href="{{$productDetail->youtube}}">
                        </a>
                    </div>
                </li>
                <li>
                    <a class="gallery-btn" href="javascript:;" data-fancybox-trigger="box-detail-gallery">
                        <img class="lozad" data-src="{{$pageContent[3]['image']}}" alt="">
                        <p>{!! strip_tags($pageContent[3]['content']) !!}</p>
                    </a>
                    <div class="fullscreen-gallery">
                        <a data-fancybox="box-detail-gallery" data-thumb="{{$productDetail->file}}"
                            href="{{$productDetail->file}}">
                        </a>
                    </div>
                </li>
                <li>
                    <a class="gallery-btn 360-btn" href="javascript:;" data-fancybox-trigger="360-gallery" onclick="window.CI360.init()">
                        <img class="lozad" data-src="{{$pageContent[4]['image']}}" alt="">
                        <p>{!! strip_tags($pageContent[4]['content']) !!}</p>
                    </a>
                    <div class="img360-popup">
                        <a  class="cloudimage-360"
                            data-folder="{{asset('website/img/360')}}"
                            data-filename="/iris-{index}.jpg"
                            data-amount="36"
                            data-magnifier="3"
                            data-spin-reverse
                            autoplay=true>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="product__main-detail">
            <ul>
                @if (count($productAttribute) != 0)
                @foreach ($productAttribute as $item)
                    <li>
                        <img class="lozad" data-src="{{$pageContent[5]['image']}}" alt="">
                        <span>{{$item->value}}</span>
                    </li>
                @endforeach
                @endif
                

            </ul>
            <a class="product-detail-btn" href="javascript:;">{!! strip_tags($pageContent[5]['content']) !!}</a>
        </div>
    </div>
    <div class="col-xl-6 product__info">
        <div class="product__info-price">
            <div class="product__info-price--left">
                @if ($productDetail->discount != null)
                    <p class="price">{{number_format($productDetail->discount)}}VNĐ</p>
                    <span class="discount">-{{ceil((($productDetail->price - $productDetail->discount) / $productDetail->price) * 100)}}%</span>
                    <span class="original-price">{{number_format($productDetail->price)}}VNĐ</span>

                    @if ($productDetail->installment == 2)
                        <p class="promotion">Có trả góp</p> 
                    @else
                        @if ($productDetail->installment == 3)
                            <p class="promotion">Trả góp 0%</p> 
                        @else
                        <p class="promotion">Mua ngay</p> 
                        @endif
                    @endif
                    
                @else
                    <p class="price">{{number_format($productDetail->price)}}VNĐ</p>
                    @if ($productDetail->installment == 2)
                        <p class="promotion">Có trả góp</p> 
                    @else
                        @if ($productDetail->installment == 3)
                            <p class="promotion">Trả góp 0%</p> 
                        @else
                        <p class="promotion">Mua ngay</p> 
                        @endif
                    @endif
                @endif
                

            </div>
            <div class="product__info-price--right">
                @if ($productDetail->discount != null)
                    <p>Tiết kiệm đến</p>
                    <span>{{number_format($productDetail->price - $productDetail->discount)}}đ</span>
                @endif
            </div>
        </div>
        @if (count($bonusProduct)>0)
            <div class="product__info-offers">
                <p>Ưu đãi thêm</p>
                <ul>
                    @foreach ($bonusProduct as $item)
                        <li>
                            <img class="lozad" data-src="{{asset('website/img/check-circle.svg')}}" alt="">
                            <span>{{$item->value}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($productDetail->promotion()->count() > 0)
            <div class="product__info-offers">
                <p>Khuyến mãi</p>
                <ul>
                    @foreach ($productDetail->promotion()->get() as $item)
                    <li>
                        <img src="{{asset('website/img/check-circle.svg')}}" alt="">
                        <span>{{$item->value}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="product__info-btn">
            <div class="buy-btn">
                <a href="javascritp:(0)" class="buy-btn add-to-cart" data-name="{{$productDetail->name}}" data-price="{{$productDetail->price}}" data-discount="{{$productDetail->discount}}" data-image="{{$productDetail->image}}" data-uuid="{{$productDetail->uuid}}" data-combo="{{$bonusCombojson}}">
                    <p>MUA NGAY</p>
                    <span>Giao hàng miễn phí hoặc nhận tại shop</span>
                </a>
            </div>
            <div class="contact-btn">
                <a href="javascript:;">
                    LIÊN HỆ ĐẶT HÀNG
                </a>
            </div>
            <div class="installment-btn">
                @if ($productDetail->installment == 2)
                    <a href="javascript:;">HỖ TRỢ TRẢ GÓP</a>
                @else
                    @if ($productDetail->installment == 3)
                        <a href="javascript:;">TRẢ GÓP 0%</a>
                    @else
                        <a href="javascript:;">KHÔNG HỖ TRỢ TRẢ GÓP</a>
                    @endif
                @endif
                
            </div>
            <div class="hotline-btn">
                <a href="tel:{!! strip_tags($pageContent[6]['content']) !!}">Gọi <b> {!! strip_tags($pageContent[6]['content']) !!} </b> để được tư vấn mua hàng</a>
            </div>
        </div>
        {{-- <div class="product__info-old">
            <a href="javascript:;">
                <p class="name">Mua hàng cũ: iPhone XSMax 64Gb</p>
                <p class="price">Giá từ: <b>20.000.000đ</b></p>
            </a>
        </div> --}}
    </div>
</div>