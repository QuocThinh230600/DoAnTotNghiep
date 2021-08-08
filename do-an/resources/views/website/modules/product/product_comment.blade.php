<div class="product__ask">
    <div class="product__ask-title">
        <p>Hỏi & Đáp về {{$productDetail->name}}
        </p>
        <span>{{$productDetail->contact()->count()}}</span>
    </div>
    <div class="product__ask-add">
        <form action="{{route('storeContact')}}" method="POST"
        class="formAjaxContact">
            @csrf
            @method('POST')
            <input type="hidden" name="uuid" value="{{$productDetail->slug}}" >
            <input type="text" placeholder="Nhập tên của bạn" name="full_name" required>
            <textarea name="message" id="" cols="30" rows="5" placeholder="Viết câu hỏi của bạn" required></textarea>
            <button style="color:white;border:none">Gửi câu hỏi</button>
        </form>
    </div>
    @php
        $i=0;
    @endphp
    @foreach ($productDetail->contact()->orderBy('created_at','desc')->get() as $item)
    @php
        $i++;
    @endphp
    <div class="product__ask-question" id="question{{$i}}">
        <div class="avatar">
            <img class="lozad" data-src="{{asset('website/img/user.svg')}}" alt="">
        </div>
        <div class="content">
            <div class="name">
                <p>{{$item->full_name}}</p>
                <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
            </div>
            <div class="question">
                <p>{{strip_tags($item->message)}}</p>
            </div>
            <a data-answer="{{$i}}" href="javascript:;" class="answer-btn">Trả lời</a>
        </div>
        @foreach ($item->reply_contact()->where('reply','<>',null)->get() as $item1)
            <div class="answer" style="width: 100%;">
                <div class="name">
                    @if ($item1->user_id)
                    <p>{{$item1->users->full_name}}</p>
                    <span class="role">Quản trị viên</span>
                    @else
                    <p >{{$item1->full_name}}</p>
                    @endif
                    <span class="date">{{ \Carbon\Carbon::parse($item1->created_at)->diffForHumans() }}</span>
                </div>
                <div class="content">
                    <p >{{strip_tags($item1->reply)}}</p>
                </div>
            </div>
        @endforeach
        
        <div class="add-answer">
            <form action="{{route('storeReply')}}" method="POST"
            class="formAjaxContact">
                @csrf
                @method('POST')
                <input type="hidden" name="uuid" value="{{$item->uuid}}" >
                <input type="text" placeholder="Nhập tên của bạn" name="full_name" required>
                <textarea name="reply" id="" cols="30" rows="5" placeholder="Viết câu hỏi của bạn" required></textarea>
                <button style="color:white;border:none" >Gửi câu hỏi</button>
            </form>
            
        </div>
    </div>
    @endforeach
    
    
</div>