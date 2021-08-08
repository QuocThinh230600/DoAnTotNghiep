<div class="col-xl-8">
    <div class="news-detail__title">
        <h1>{{ $newsDetail->title }}</h1>
    </div>
    <div class="news-detail__time">
        <span>{{ $newsDetail->created_at }}</span>
    </div>
    <div class="news-detail__intro">
        <p>{!! strip_tags($newsDetail->intro) !!}</p>
    </div>
    <div class="news-detail__content">
        <img class="lozad" data-src="{{ $newsDetail->image }}">
        <p>{!! $newsDetail->content !!}</p>
    </div>
    @include('website.modules.new_detail.news_related')
</div>