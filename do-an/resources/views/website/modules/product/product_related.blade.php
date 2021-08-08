<div class="product__related">
    <div class="product__related-title">
        <p>Sản phẩm tương tự</p>
    </div>
    <div class="product__related-carousel">
        <!-- On mobile just show 4 -->
        @foreach ($productRelated as $item)
            <div class="carousel-cell">
                <div class="product__related-carousel--item">
                    <a href="{{route('product', $item->slug)}}">
                        <div class="img">
                            <img class="lozad" data-src="{{$item->image}}" alt="">
                        </div>
                        <div class="content">
                            <p class="name">{{$item->name}}</p>
                            @if ($item->discount != null)
                                <p class="price">{{number_format($item->discount)}}VNĐ</p>
                                <span class="original-price">{{number_format($item->price)}}VNĐ</span>
                                <span class="discount">-{{ceil((($item->price - $item->discount) / $item->price) * 100)}}%</span>
                            @else
                                <p class="price">{{number_format($item->price)}}VNĐ</p>
                            @endif
                            
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>