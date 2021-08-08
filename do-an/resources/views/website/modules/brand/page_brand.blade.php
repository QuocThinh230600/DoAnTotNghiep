@extends('website.master')

@section('content')
<main class="category">
    <div class="container">
        @include('website.modules.brand.banner')
        @include('website.modules.brand.brand')
        <div class="category__product">
            @include('website.modules.brand.filter')
            </div>
            @include('website.modules.brand.product_list')
            
           
        </div>
        @include('website.modules.brand.category_policy')
    </div>
</main>
<div class="overlay"></div>
@endsection