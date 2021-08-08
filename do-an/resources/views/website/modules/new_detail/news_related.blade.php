<div class="news-detaill__related">
    <h5>BÀI VIẾT LIÊN QUAN</h5>
    <div class="news-carousel carousel">
        <!-- Maximum 3 post each slide -->
        @foreach ($newsralated as $key => $newRE)
                @if ($key % 3 == 0)
                    <div class="carousel-cell ">
                        <ul>
                @endif
                <li>
                    <a href="{{ route('new_detail', $newRE->slug) }}">
                        <div class="thumb">
                            <img class="lozad" data-src="{{ $newRE->image }}" alt="">
                        </div>
                        <div class="content">
                            <div class="title">
                                <h6>{{ $newRE->title }}</h6>
                            </div>
                            <div class="date">
                                <span>{{ \Carbon\Carbon::parse(DB::table('news')->find($newRE->id)->created_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                    </a>
                </li>
                @if ($key % 3 == 2)
                    </ul>
        </div>
        @endif
        @endforeach
        @if ($key % 3 != 2)
            </ul>
    </div>
    @endif
    </div>
</div>