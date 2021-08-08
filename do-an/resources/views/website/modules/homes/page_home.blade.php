@extends('website.master')

@section('content')
    <main class="home">
        <div class="container">
            @include('website.modules.homes.banner')
            @include('website.modules.homes.cate_mobile')
            @include('website.modules.homes.deal_product')
            @include('website.modules.homes.home_combo')
            @include('website.modules.homes.home_hot')
            @include('website.modules.homes.home_news')
        </div>
    </main>
    <div class="overlay"></div>
@endsection