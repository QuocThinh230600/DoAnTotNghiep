<div class="home__news">
    <div class="home__news-title">
        <h6>TIN TỨC</h6>
    </div>
    <div class="home__news-highlight">
        <iframe class="lozad" data-src="{!! strip_tags($pageContent[0]['content']) !!}" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
    <div class="home__news-list">
        <ul>
            @foreach ($newsfooter as $newsF)
            <li>
                <a href="{{route('new_detail',$newsF->slug)}}">
                    <div class="thumb">
                        <img class="lozad" data-src="{{$newsF->image}}" alt="">
                    </div>
                    <div class="content">
                        <p>{{$newsF->title}}</p>
                        <span>{!! strip_tags($newsF->intro) !!}</span>
                    </div>
                </a> 
            </li>
            @endforeach
        </ul>
        <div class="see-more">
            <a href="{{route('news')}}">{!! strip_tags($pageContent[1]['content']) !!} <img class="lozad" data-src="{{$pageContent[1]['image']}}" alt=""></a>
        </div>
    </div>
</div>