<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('website/partials/head')
</head>

<body>
    @include('website/partials/header')

    @yield('content')
    
    <footer>
        <div class="container">
            @include('website/partials/footer_showroom')
            
            @include('website/partials/footer_service')
        </div>
        <div class="container-fluid">
            <div class="copyright">
                <p>Copy right 2021 @Kitchenstore</p>
            </div>
        </div>
    </footer>
    @include('website/partials/script_footer')
</body>

</html>