@extends('website.master')
@section('content')
<main class="cart-confirm">
    <div class="container">
        <div class="cart-confirm__title">
            <img class="lozad" data-src="{{$pageContent[0]['image']}}" alt="">
            <SPAN>{!! strip_tags($pageContent[0]['content']) !!}</SPAN>
        </div>
        <div class="cart-confirm__content">
            <p class="thanks">{!! strip_tags($pageContent[1]['content']) !!} <b>{{$order->fullname}}</b> {!! strip_tags($pageContent[2]['content']) !!} 
                 <b>{!! strip_tags($pageContent[3]['content']) !!}</b> {!! strip_tags($pageContent[4]['content']) !!}</p>
            <div class="cart-confirm__content-info">
                {{--  <p>ĐƠN HÀNG #43448287</p>  --}}
                <p>{!! strip_tags($pageContent[5]['content']) !!}</p>
                <ul>
                    <li><b>{!! strip_tags($pageContent[6]['content']) !!} </b>{{$order->name_receive==null ? $order->fullname .', '. $order->phone : $order->name_receive .', '. $order->phone_receive}}</li>
                    <li><b>{!! strip_tags($pageContent[7]['content']) !!} </b>{{$order->address}} {!! strip_tags($pageContent[8]['content']) !!}</li>
                    <li><b>{!! strip_tags($pageContent[9]['content']) !!} </b> {{number_format($order->fee)}} <small>đ</small></li>
                    <li><b>{!! strip_tags($pageContent[10]['content']) !!} </b><span> {{number_format($order->total + $order->fee)}}</span> <small>đ</small></li>
                </ul>
            </div>
            <div class="cart-confirm__content-pay">
                <p>{{$order->fullname}} {!! strip_tags($pageContent[11]['content']) !!}</p> 
                <b>
                    @foreach (payment_method() as $item)
                        @if ($order->payment_method == $item->id)
                            {{$item->name}}
                        @endif
                    @endforeach
                </b>
            </div>
            <div class="cart-confirm__content-time">
                <p class="cart-confirm__content-time--title">{!! strip_tags($pageContent[12]['content']) !!}</p>
                <div class="cart-confirm__content-time--detail">
                    @php
                        $timeToTrade = explode("<br>", $order->note)
                    @endphp
                    <p>{{$timeToTrade[0]}}</p>
                    @foreach ($details as $item)
                    <a href="{{route('product',$item->product->slug)}}">
                        <img class="lozad" data-src="{{$item->product->image}}" alt="">
                        <div class="detail">
                            <p>{{$item->product->name}}</p>
                            <span>Số lượng: {{$item->quantity}}</span>
                        </div>
                    </a>
                    @endforeach
                    
                    <div class="total">
                        <p>Tổng tiền:</p>
                        <span>{{number_format($order->total)}} <small>đ</small></span>
                    </div>
                </div>
            </div>
            <div class="cart-confirm__content-btn">
                <a href="javascript:(0)">{!! strip_tags($pageContent[13]['content']) !!}</a>
            </div>
            <div class="cart-confirm__content-btn active">
                <a href="{{route('home')}}">{!! strip_tags($pageContent[14]['content']) !!}</a>
            </div>
        </div>
    </div>
</main>
<div class="overlay"></div>
@endsection