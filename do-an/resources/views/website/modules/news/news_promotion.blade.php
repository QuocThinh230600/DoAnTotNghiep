<div class="news__promotion">
    <div class="news__promotion-highlight">
        @foreach ($newsTopPromotion as $newT)
        <a href="{{route('new_detail',$newT->slug)}}">
            <div class="thumb">
                <img class="lozad" data-src="{{$newT->image}}" alt="">
            </div>
            <div class="content">
                <div class="news-label">
                    <span>Tin Mới</span>
                </div>
                <div class="title">
                    <h2>{{$newT->title}}</h2>
                </div>
            </div>
        </a>    
        @endforeach
    </div>
    <div class="news__promotion-list">
        @foreach ($newsTopPromotionList as $newL)
        <a href="{{route('new_detail',$newL->slug)}}">
            <div class="thumb">
                <img class="lozad" data-src="{{$newL->image}}" alt="">
            </div>
            <div class="content">
                <div class="title">
                    <h6>{{$newL->title}}</h6>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
