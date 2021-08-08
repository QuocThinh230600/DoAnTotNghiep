@extends('website.master')

@section('content')
<main class="news-detail">
    <div class="container">
        <div class="row">
            @include('website.modules.new_detail.news_one_detail')
            <div class="col-4">
                @include('website.modules.new_detail.news_sale')
                @include('website.modules.new_detail.news_recruitment')
                
                @include('website.modules.new_detail.news_sale_mobile')
                @include('website.modules.new_detail.news_recruitment_mobile')
            </div>
        </div>
    </div>
</main>
<div class="overlay"></div>
@endsection
