@extends('website.master')
@push('themejs')
    <link href="{{ asset(GLOBAL_ASSETS_CSS.'icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset(ASSETS_CSS.'components.min.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/pnotify.min.js') }}"></script>
@endpush
@section('content')
<main class="product">
    <div class="container">
        @include('website.modules.product.breadcrumb')
        @include('website.modules.product.product_title')
        @include('website.modules.product.detail_product')
        @include('website.modules.product.detail_two_product')
        @include('website.modules.product.product_buynow')
        @include('website.modules.product.product_attached_mobile')
        @include('website.modules.product.product_question')
        @include('website.modules.product.product_related')
        @include('website.modules.product.product_rating')
        @include('website.modules.product.product_comment')
        @include('website.modules.product.product_news')
    </div>
</main>
<div class="overlay"></div>
@include('website.modules.product.popup_buy_now')
@include('website.modules.product.popup_detail')
@endsection