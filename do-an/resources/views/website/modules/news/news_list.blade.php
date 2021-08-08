<div class="news__news-list">
    <h5>Tin tức</h5>
    <ul id="ajax_new_ul">
        @foreach($newsAll as $newA)
        <li>
            <a href="{{route('new_detail',$newA->slug)}}">
                <div class="thumb">
                    <img class="lozad" data-src="{{$newA->image}}" alt="">
                </div>
                <div class="content">
                    <div class="title">
                        <h6>{{$newA->title}}</h6>
                    </div>
                    <div class="intro">
                        <p>{!! strip_tags($newA->intro) !!}</p>
                    </div>
                    <div class="info">
                        {{-- @foreach ($newsCate as $cate) --}}
                        <div class="category">
                            @php
                                $CategoryName = DB::table('category_news')
                                ->leftjoin('categories_translations','category_news.category_id','categories_translations.category_id')
                                ->where('category_news.news_id','=',$newA->news_id)
                                ->value('categories_translations.name')
                            @endphp
                            <span>{{$CategoryName}}</span>

                        </div>
                        {{-- @endforeach --}}

                        <div class="date">
                            <span>{{\Carbon\Carbon::parse(DB::table('news')->find($newA->id)->created_at)->diffForHumans()}}</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
    <div class="see-more-btn">
        <a href="javascript:(0)" id="load_more" data-url="{{route('ajax-news')}}" data-count="5">XEM THÊM</a>
    </div>
</div>
