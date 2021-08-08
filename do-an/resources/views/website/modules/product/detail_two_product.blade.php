<div class="row">
    <div class="col-xl-7">
        <div class="product__review">
            <p class="product__review-title">{!! strip_tags($pageContent[7]['content']) !!}</p>
            @if (count($PostImage) != 0)
            <div class="review-carousel carousel">
               
                    @foreach ($PostImage as $item)
                        <div class="carousel-cell">
                            <img class="lozad" data-src="{{$item->image}}" alt="">
                        </div>
                    @endforeach
            </div>
            @endif

            <h6>{!! strip_tags($pageContent[8]['content']) !!}</h6>
            <div class="product__review-intro">
                <p>{!! strip_tags($productDetail->intro) !!}</p>
            </div>
            <div class="product__review-content">
                <img class="lozad" data-src="{{$productDetail->image}}" alt="">
                {!! strip_tags($productDetail->content) !!}
            </div>
            <div class="product__review-see-more">
                <a class="see-more-btn" href="javascript:;">
                    {!! strip_tags($pageContent[9]['content']) !!}
                    <img class="lozad" data-src="{{asset('website/img/dropdown-arrow.svg')}}" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="product__detail">
            <p>{!! strip_tags($pageContent[10]['content']) !!}</p>
            <table>
                @foreach ($attributeProduct as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->value}}</td>
                    </tr>
                @endforeach
                
                
            </table>
            <div class="product__detail-see-more">
                <a class="product-detail-btn" href="javascript:;">
                    {!! strip_tags($pageContent[11]['content']) !!}
                </a>
            </div>
        </div>
        <div class="product__attached">
            <div class="product__attached-title">
                <span>{!! strip_tags($pageContent[12]['content']) !!}</span>
                <a href="javascript:;">Xem tất cả</a>
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
        </div>
    </div>
</div>