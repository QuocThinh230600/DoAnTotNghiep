<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<title>Kitchen Store - {{ $meta->name ?? $meta->title }}</title>

<link rel="icon" href="{{ $config['favicon'] }}">

<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="format-detection" content="telephone=no">
<meta name="keywords" content="{{ $meta->meta_keywords }}"/>
<meta name="description" content="{{ $meta->meta_description }}"/>
<meta name="robots" content="{{ $meta->meta_robots }}"/>
<meta name="googlebot" content="{{ $meta->meta_google_bot }}" />
<meta name="apple-mobile-web-app-title" content="SOL - {{ $meta->title_tag }}"/>
<meta name="dc.publisher" content=""/>
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ $meta->name ?? $meta->title }}">
<meta itemprop="description" content="{{ $meta->meta_description }}">
<meta itemprop="image" content="{{ $meta->image }}">
<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ $meta->name ?? $meta->title }}">
<meta name="twitter:title" content="SOL - {{ $meta->name ?? $meta->title }}">
<meta name="twitter:description" content="{{ $meta->meta_description }}">
<meta name="twitter:creator" content="SOL">
<meta name="twitter:image:src" content="{{ $meta->image }}">
<!-- Open Graph data -->
<meta property="og:title" content="SOL - {{ $meta->title_tag }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ $meta->image }}" />
<meta property="og:description" content="{{ $meta->meta_description }}" />
<meta property="og:site_name" content="SOL - {{ $meta->title_tag }}" />
<meta property="article:published_time" content="" />
<meta property="article:modified_time" content="" />
<meta property="article:section" content="" />
<meta property="article:tag" content="" />
<meta property="fb:admins" content="" />



<link rel="stylesheet" href="{{asset('website/dest/style.min.css')}}">
<link rel="stylesheet" href="{{asset('website/dest/fonts.css')}}">
<link rel="stylesheet" href="{{asset('website/dest/stylelibs.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all">
<script src="{{ asset(ASSETS_JS.'lozad.js') }}"></script>  




<script src="{{ asset(GLOBAL_ASSETS_JS.'main/jquery.min.js') }}"></script>
<script src="{{ asset(ASSETS_JS.'ajax.js') }}"></script>
<script src="{{asset('website/js/addcart.js')}}"></script>
{{-- <script src="https://cdn.scaleflex.it/plugins/js-cloudimage-360-view/2.6.0/js-cloudimage-360-view.min.js"></script> --}}

@php
    $domain = (env("APP_URL") == 'http://localhost') ? 'http://localhost:8000' : env("APP_URL");
@endphp

<script type="text/javascript">
    let domainPath = '{{ $domain }}';
</script>
<script src="{{ asset(LANG_PATH.'vi.js') }}"></script>
@stack('themejs')
