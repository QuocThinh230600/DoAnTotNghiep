@extends('website.master')

@section('content') 
<main class="category">
    <div class="container">
        <h1>{!! strip_tags($pageContent[0]['content']) !!} {{$key}}</h1>
        <div class="category__product">
            <div class="category__product-list">
                <ul>
                    @if (count($Search) == 0)
                        <h1 style="height: 50vh; padding: 40px;">{!! strip_tags($pageContent[1]['content']) !!}</h1>
                    @else
                        @foreach ($Search as $product)
                            <li>
                                <a href="{{route('product',$product->slug)}}">
                                    <div class="promotion-label">
                                        @if ($product->installment == 2)
                                            <span class="promotion-item">CÓ TRẢ GÓP</span>
                                        @else
                                            @if ($product->installment == 3)
                                                <span class="promotion-item">TRẢ GÓP 0%</span>
                                            @else
                                            <span class="promotion-item">MUA NGAY</span>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="img"> 
                                        {{-- {{dd($product->image)}} --}}
                                        @if ($product->image != null)
                                            <img class="lozad" data-src="{{$product->image}}" alt="">
                                        @else
                                            <img class="lozad" src="{{$config->value}}" alt="">
                                        @endif 
                                    </div>
                                    <div class="hot-deal">
                                        @if (strpos($product->featured,'6'))
                                            <img class="lozad" data-src="{{asset('website/img/hot-deal.png')}}" alt="">
                                        @endif 
                                    </div>
                                    <div class="name">
                                        <span>{{$product->name}}</span>
                                    </div>
                                    @if ($product->discount != null)
                                        <div class="sale-price">
                                            <span>{{number_format($product->discount)}}VNĐ</span>
                                        </div>
                                        <div class="original-price">
                                            @if ($product->discount != $product->price)
                                                <p>-{{ceil((($product->price - $product->discount) / $product->price) * 100)}}%</p>
                                            @endif
                                            <span>{{number_format($product->price)}}VNĐ</span>
                                        </div>
                                    @else
                                        <div class="sale-price">
                                            <span>{{number_format($product->price)}}VNĐ</span>
                                        </div>
                                    @endif
                                    <div class="rating">
                                        <div class="star">
                                            {!! showStar($product->review()->where('status','on')->avg('votes')) !!}
                                        </div>
                                        <div class="count">
                                            <span>{{$product->review()->where('status','on')->count()}} đánh giá</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @endif
                    
                    
                </ul>
            </div>
        </div>
    </div>
</main>
<div class="overlay"></div>

@endsection