<div class="breadcrumb">
    <ul>
        <li><a href="{{route('home')}}">{!! strip_tags($pageContent[0]['content']) !!}</a></li>
        <li>
            @foreach ($productDetail->category()->get() as $it)
            <a href="{{route('category',$it->slug)}}">
                @php
                    echo $it->name;
                @endphp
            </a>
            @php
                break;
            @endphp
            @endforeach
        </li>
    </ul>
</div>