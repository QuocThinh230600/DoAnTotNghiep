@foreach($newsAjax as $newA)
        <li>
            <a href="{{route('new_detail',$newA->slug)}}">
                <div class="thumb">
                    <img src="{{$newA->image}}" alt="">
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