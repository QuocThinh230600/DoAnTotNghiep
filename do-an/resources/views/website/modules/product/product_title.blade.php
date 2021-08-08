<div class="product__title">
    <h1>{{$productDetail->name}}</h1>
    <div class="rating">
        <div class="star">
            {!! showStar($productDetail->review()->where('status','on')->avg('votes')) !!}
        </div>
        <div class="count">
            <span>{{$productDetail->review()->where('status','on')->count()}} đánh giá</span>
        </div>
    </div>
</div>