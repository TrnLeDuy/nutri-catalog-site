@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    $lang = LaravelLocalization::setLocale() ? LaravelLocalization::setLocale() : 'en';
    $favicon = setting('core::favicon') ? setting('core::favicon') : Theme::url('images/default/favicon.png');
    $header_logo = setting('core::logo') ? setting('core::logo') : Theme::url('images/logo.png');
    $header_banner = setting('core::banner') ? setting('core::banner') : Theme::url('images/banner.png');
    $site_name = setting('core::site-name') ? setting('core::site-name') : 'NutriFarm';
    $site_description = setting('core::site-description') ? setting('core::site-description') : 'Nutrifarm';
    $footer_logo = setting('core::logo') ? setting('core::logo') : Theme::url('images/logo.png');
    $address = setting('core::address') ? setting('core::address') : 'San Francisco City Hall, San Francisco, CA';
    $email = setting('core::email') ? setting('core::email') : 'contact123@gmail.com';
    $phone = setting('core::phone') ? setting('core::phone') : '(654) 321-7654';
@endphp

<!DOCTYPE html>
<html>

<head lang="{{ $lang }}">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="nutrifarm" />
    <meta name="author" content="duy_dev" />
    @section('meta')
        <meta name="description" content="{{ $site_description }}" />
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="pusher-key" content={{ config('broadcasting.connections.pusher.key') }}>
    <meta name="cluster" content={{ config('broadcasting.connections.pusher.options.cluster') }}>
    <meta name="app-url" content={{ config('app.url') }}>
    <title>
        @section('title') {{ $site_name }} @show
    </title>
    @if (isset($alternate))
        @foreach ($alternate as $alternateLocale => $alternateSlug)
            <link rel="alternate" hreflang="{{ $alternateLocale }}"
                href="{{ url($alternateLocale . '/' . $alternateSlug) }}">
        @endforeach
    @endif

    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="shortcut icon" href="{{ $favicon }}">

    {!! Theme::style('css/flag-icon.css') !!}
    {!! Theme::style('css/bootstrap.min.css') !!}
    {!! Theme::style('css/fontawesome/css/font-awesome.min.css') !!}
    {!! Theme::style('css/owl.carousel.min.css') !!}
    {!! Theme::style('css/bootstrap-select.min.css') !!}
    {!! Theme::style('css/magnific-popup.min.css') !!}
    {!! Theme::style('css/loader.min.css') !!}
    {!! Theme::style('css/style.css') !!}
    {!! Theme::style('css/flaticon.min.css') !!}
    {!! Theme::style('css/lc_lightbox.css') !!}
    {!! Theme::style('css/skin/skin-4.css') !!}
    {!! Theme::style('css/switcher.css') !!}
    {!! Theme::style('plugins/revolution/revolution/css/settings.css') !!}
    {!! Theme::style('plugins/revolution/revolution/css/navigation.css') !!}

    {!! Theme::style('css/main.css') !!}
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('css-stack')

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="page-wraper">
        @include('partials.nav')
        @yield('content')
        @include('partials.footer')
        <button class="scroltop" style="border-radius: 50%; background-color:#00C24F;"><span
                class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>
    </div>

    <div class="loading-area">
        <div class="loading-box"></div>
        <div class="loading-pic">
            <div class="loader">
                <span style="background-color: #00C24F" class="block-1"></span>
                <span style="background-color: #00C24F" class="block-2"></span>
                <span style="background-color: #00C24F" class="block-3"></span>
                <span style="background-color: #00C24F" class="block-4"></span>
                <span style="background-color: #00C24F" class="block-5"></span>
                <span style="background-color: #00C24F" class="block-6"></span>
                <span style="background-color: #00C24F" class="block-7"></span>
                <span style="background-color: #00C24F" class="block-8"></span>
                <span style="background-color: #00C24F" class="block-9"></span>
                <span style="background-color: #00C24F" class="block-10"></span>
                <span style="background-color: #00C24F" class="block-11"></span>
                <span style="background-color: #00C24F" class="block-12"></span>
                <span style="background-color: #00C24F" class="block-13"></span>
                <span style="background-color: #00C24F" class="block-14"></span>
                <span style="background-color: #00C24F" class="block-15"></span>
                <span style="background-color: #00C24F" class="block-16"></span>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Theme::script('js/template-js/jquery-2.2.0.min.js') !!}
    {!! Theme::script('js/template-js/popper.min.js') !!}
    {!! Theme::script('js/template-js/bootstrap.min.js') !!}
    {!! Theme::script('js/template-js/bootstrap-select.min.js') !!}
    {!! Theme::script('js/template-js/magnific-popup.min.js') !!}
    {!! Theme::script('js/template-js/waypoints.min.js') !!}
    {!! Theme::script('js/template-js/counterup.min.js') !!}
    {!! Theme::script('js/template-js/waypoints-sticky.min.js') !!}
    {!! Theme::script('js/template-js/isotope.pkgd.min.js') !!}
    {!! Theme::script('js/template-js/owl.carousel.min.js') !!}
    {!! Theme::script('js/template-js/stellar.min.js') !!}
    {!! Theme::script('js/template-js/theia-sticky-sidebar.js') !!}
    {!! Theme::script('js/template-js/jquery.bootstrap-touchspin.js') !!}
    {!! Theme::script('js/template-js/lc_lightbox.lite.js') !!}
    {!! Theme::script('js/template-js/switcher.js') !!}
    {!! Theme::script('js/script.js') !!}

    {{-- REVOLUTION JS FILES --}}
    {!! Theme::script('plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') !!}
    {!! Theme::script('plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') !!}

    {{-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) --}}
    {!! Theme::script('plugins/revolution/revolution/js/extensions/revolution-plugin.js') !!}

    {{-- REVOLUTION SLIDER SCRIPT FILES --}}
    {!! Theme::script('js/template-js/rev-script-5.js') !!}
    @yield('scripts')
    
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif
</body>

</html>
