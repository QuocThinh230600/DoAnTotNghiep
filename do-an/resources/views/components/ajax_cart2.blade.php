
@if ($pro!=null)
@foreach ($pro as $p)
<div class="cart-confirm__product-item">
    <div class="img">
        <img src="{{$p['image']}}" alt="">
    </div>
    <div class="content">
        <p class="name">{{$p['name']}}</p>
        <span>Số lượng: {{$p['count']}}</span>
    </div>
</div>
@endforeach
@endif

