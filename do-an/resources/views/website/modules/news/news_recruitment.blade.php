<div class="news__sidebar">
    <h5>Tin tuyển dụng</h5>
    <div class="news-carousel carousel">
        <!-- Maximum 5 post each slide -->
        @foreach ($newsRecruitment as $key => $newR)
            @if ($key % 5 == 0)
                <div class="carousel-cell ">
                    <ul>
            @endif
                        <li>
                            <a href="{{route('new_detail',$newR->slug)}}">
                                <div class="thumb">
                                    <img class="lozad" data-src="{{$newR->image}}" alt="">
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <h6>{{$newR->title}}</h6>
                                    </div>
                                    <div class="date">
                                        <span>{{\Carbon\Carbon::parse(DB::table('news')->find($newR->id)->created_at)->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
            @if($key % 5 == 4)
                    </ul>
                </div>
            @endif
        @endforeach
            @if($key % 5 != 4)
                    </ul>
                </div>
            @endif
    </div>
</div>
