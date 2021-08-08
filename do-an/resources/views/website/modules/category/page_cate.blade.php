@extends('website.master')

@section('content')
<main class="category">
    <div class="container">
        @include('website.modules.category.banner')
        @include('website.modules.category.brand')
        <div class="category__product">
            @include('website.modules.category.filter')
            </div>
            @include('website.modules.category.product_list')
            
            @include('website.modules.category.category_related')
        </div>
        @include('website.modules.category.category_policy')
    </div>
</main>
<div class="overlay"></div>
@endsection