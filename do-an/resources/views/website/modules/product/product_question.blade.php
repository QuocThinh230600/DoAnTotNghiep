<div class="product__question">
    <h6>{!! strip_tags($pageContent[16]['content']) !!}</h6>
    <div class="product__question-list">
        @foreach ($ProductQuestion as $item)
            <div class="product__question-list--item" id="question{{$item->id}}">
                <div class="question" data-question="{{$item->id}}">
                    <p><img class="lozad" data-src="{{$pageContent[16]['image']}}" alt="">{{$item->question}}</p>
                    <div class="question__icon">
                        <span></span>
                    </div>
                </div>
                <div class="answer">
                    <p>{!! strip_tags($item->answer) !!}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>