<div class="service">
    <div class="service__left">
        <ul>
            <li>
                <a href="javascript:(0)">Lịch sử mua hàng</a>
            </li>
            <li>
                <a href="javascript:(0)">Tìm hiểu mua trả góp 0%</a>
            </li>
            <li>
                <a href="javascript:(0)">Hướng dẫn đặt mua online</a>
            </li>
            <li>
                <a href="javascript:(0)">Chính sách thanh toán</a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="javascript:(0)">Về KITCHEN STORE</a>
            </li>
            <li>
                <a href="javascript:(0)">Tuyển dụng</a>
            </li>
            <li>
                <a href="javascript:(0)">Góp ý</a>
            </li>
            <li>
                <a href="javascript:(0)">Chính sách thanh toán</a>
            </li>
        </ul>
    </div>
    <div class="service__right">
        <ul>
            <li>
                <span>{!! strip_tags($content[2]['content']) !!}</span>
                <a href="tel:{!! strip_tags($content[3]['content']) !!}">{!! strip_tags($content[3]['content']) !!}</a>
            </li>
            <li>
                <span>{!! strip_tags($content[4]['content']) !!}</span>
                <a href="tel:{!! strip_tags($content[5]['content']) !!}">{!! strip_tags($content[5]['content']) !!}</a>
            </li>
            <li>
                <span>{!! strip_tags($content[6]['content']) !!}</span>
                <a href="tel:{!! strip_tags($content[7]['content']) !!}">{!! strip_tags($content[7]['content']) !!}</a>
            </li>
            <li>
                <span>{!! strip_tags($content[8]['content']) !!}</span>
                <a href="tel:{!! strip_tags($content[9]['content']) !!}">{!! strip_tags($content[9]['content']) !!}</a>
            </li>
        </ul>
        <div class="service__right-support">
            <div class="facebook">
                <a href="{!! strip_tags($content[12]['content']) !!}">
                    <img class="lozad" data-src="{{$content[12]['image']}}" alt="">
                    <span>3.5tr</span>
                </a>
            </div>
            <div class="youtube">
                <a href="{!! strip_tags($content[13]['content']) !!}">
                    <img class="lozad" data-src="{{$content[13]['image']}}" alt="">
                    <span>785k</span>
                </a>
            </div>
            <div class="payment">
                <p>{!! strip_tags($content[14]['content']) !!}</p>
                <img class="lozad" data-src="{{$content[14]['image']}}" alt="">
            </div>
        </div>
        <div class="service__right-security">
            <img class="lozad" data-src="{{asset('website/img/bocongthuong.png')}}" alt="">
            <img class="lozad" data-src="{{$content[10]['image']}}" alt="">
            <img class="lozad" data-src="{{$content[11]['image']}}" alt="">
        </div>
    </div>
</div>