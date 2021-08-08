
@if ($pro!=null)
@foreach ($pro as $p)
<div class="cart__main-product">
    <div class="cart__main-product--left">
        <div class="img">
            <img src="{{$p['image']}}" alt="">
        </div>
        <div class="content">
            <p>{{$p['name']}}</p>
            @if (isset($p['combo']))
                <div class="promotion">
                    <ul>
                        @foreach ($p['combo'] as $item)
                            <li>{{$item}}</li>
                        @endforeach
                    </ul>
                    <div class="promotion-btn" href="javascript:(0)">
                        <span>Các khuyến mãi</span>
                        <img src="{{ asset('website') }}/img/dropdown-arrow-blue.svg" alt="">
                    </div>
                </div>
            @endif 
        </div>
    </div>
    <div class="cart__main-product--right">
        <p class="price">{{$p['discount']== "" ? number_format ($p['price']) : number_format ($p['discount'])}}đ</p>
        @if ($p['discount']!= "" )
            <p class="original-price">{{number_format ($p['price'])}}đ</p>
        @endif
        <div class="number">
            <a class="minus minus-item" data-uuid="{{$p['uuid']}}" href="javascript:(0)">-</a>
            <input type="number" disabled min="0" value="{{$p['count']}}">
            <a class="add  plus-item" data-uuid="{{$p['uuid']}}" href="javascript:(0)">+</a>
        </div>
    </div>
    <a href="javascript:(0)" class=" delete-item" data-uuid="{{$p['uuid']}}"><img src="{{ asset('website') }}/img/delete1.svg" alt="">Xóa</a>
</div>

@endforeach
@endif

