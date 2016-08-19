<!doctype html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', Config::get('site.title'))</title>

        <meta name="description" content="@yield('description', Config::get('site.description'))">

        @section('twitter_meta')
        <meta name="twitter:card" content="summary" />
        <!-- Twitter handle of the site -->
        <meta name="twitter:site" content="" />
        @show

        @section('og')
        <meta property="fb:app_id" content="{{ Config::get('service.facebook.client_id') }}" />

        <meta property="og:site_name" content="{{ Config::get('site.name') }}" /> 
        <meta property="og:url" content="{{ URL::current() }}" /> 
        <meta property="og:type" content="website" /> 
        <meta property="og:title" content="@yield('og:title', Config::get('site.title'))" /> 
        <meta property="og:description" content="@yield('description', Config::get('site.description'))" /> 
        <meta property="og:image" content="@yield('og:image', Config::get('site.default_image') )" />
        @show

        <link rel="canonical" href="{{ URL::current() }}">

        <meta name="base_url" content="{{ URL::to('/') }}">
        <meta name="_token" content="{{ csrf_token() }}" />

        <link rel="apple-touch-icon" sizes="57x57" href="{{ assets_url('images/favicons/apple-touch-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ assets_url('images/favicons/apple-touch-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ assets_url('images/favicons/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ assets_url('images/favicons/apple-touch-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ assets_url('images/favicons/apple-touch-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ assets_url('images/favicons/apple-touch-icon-120x120.png') }}">
        <link rel="icon" type="image/png" href="{{ assets_url('images/favicons/favicon-16x16.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ assets_url('images/favicons/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ assets_url('images/favicons/favicon-96x96.png') }}" sizes="96x96">

        <link rel="stylesheet" href="{{ assets_url('css/vendors/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ assets_url('css/site.prefixed.min.css') }}?v={{ filemtime(public_path() . '/assets/css/site.prefixed.min.css') }}">
        <link rel="stylesheet" href="{{ assets_url('css/vendors/font-awesome.min.css') }}">

        @yield('styles')

        <script>
            window.base_url = '{{ URL::to('/') }}';
        </script>
    </head>
    <body>
        <div id="fb-root"></div>

        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId: '{{ Config::get('services.facebook.client_id') }}',
                    cookie: true,
                    xfbml: true,
                    version: 'v2.6'
                });
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        @include('_partials.header')
        
        @yield('content')

        @include('_partials.footer')

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ str_replace('/', '\/', assets_url('js/vendors/jquery-2.2.3.min.js')) }}"><\/script>')</script>

        <script src="{{ assets_url('js/vendors/bootstrap.min.js') }}"></script>
        <script src="{{ assets_url('js/site.min.js') }}?v={{ filemtime(public_path() . '/assets/js/site.min.js') }}"></script>

        @yield('scripts')

    </body>
</html>