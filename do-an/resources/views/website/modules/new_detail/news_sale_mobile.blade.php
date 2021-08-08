<div class="news__sidebar-mobile">
    <h5>Tin khuyến mãi</h5>
    <ul>
        @foreach ($newsSale as $newS)
            <li>
                <a href="{{ route('new_detail', $newS->slug) }}">
                    <div class="thumb">
                        <img class="lozad" data-src="{{ $newS->image }}" alt="">
                    </div>
                    <div class="content">
                        <div class="title">
                            <h6>{{ $newS->title }}</h6>
                        </div>
                        <div class="date">
                            <span>{{ \Carbon\Carbon::parse(DB::table('news')->find($newS->id)->created_at)->diffForHumans() }}</span>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
