<div class="news__sidebar">
    <h5>Tin khuyến mãi</h5>
    <div class="news-carousel carousel">
        <!-- Maximum 5 post each slide -->
        @foreach ($newsSale as $key => $newS)
            @if ($key % 5 == 0)
                <div class="carousel-cell ">
                    <ul>
            @endif
                        <li>
                            <a href="{{route('new_detail',$newS->slug)}}">
                                <div class="thumb">
                                    <img class="lozad" data-src="{{$newS->image}}" alt="">
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <h6>{{$newS->title}}</h6>
                                    </div>
                                    <div class="date">
                                        <span>{{\Carbon\Carbon::parse(DB::table('news')->find($newS->id)->created_at)->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
            @if ($key % 5 == 4)
                    </ul>
                </div>
            @endif
        @endforeach

            @if ($key % 5 != 4)
                    </ul>
                </div>
            @endif
    </div>
</div>
