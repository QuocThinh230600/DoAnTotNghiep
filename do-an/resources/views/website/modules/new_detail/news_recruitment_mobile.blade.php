<div class="news__sidebar-mobile">
    <h5>Tin tuyển dụng</h5>
    <ul>
        @foreach ($newsRecruitment as $newR)
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
        @endforeach
    </ul>
</div>
