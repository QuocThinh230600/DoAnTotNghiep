@extends('website.master')

@section('content')
<main class="news">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                @include('website.modules.news.news_promotion')
                @include('website.modules.news.news_list')
            </div>
            <div class="col-xl-4">
                @include('website.modules.news.news_sale')
                @include('website.modules.news.news_recruitment')
                
                @include('website.modules.news.news_sale_mobile')
                @include('website.modules.news.news_recruitment_mobile')
            </div>
        </div>
    </div>
</main>
<div class="overlay"></div>
@endsection