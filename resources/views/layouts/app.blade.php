<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('name', 'Laravel') }}</title>
    <!-- CSS files -->
    <link href="{{ asset('backend/dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/dist/css/demo.min.css') }}" rel="stylesheet"/>
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
    @livewireStyles
</head>
<body class="">
<script src="{{ asset('backend/dist/js/demo-theme.min.js') }}"></script>
<div class="page" id="app">
    <!-- Navbar -->
    @include('layouts.partials._top-navigation')
    @include('layouts.partials._navigation')
    <div class="page-wrapper">
        @include('layouts.partials.flash-message')
        @yield('content')
        @include('layouts.partials._footer')
    </div>
</div>

<!-- Tabler Core -->
<script src="{{ asset('backend/dist/js/tabler.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/demo.min.js') }}"></script>
@stack('scripts')
@livewireScripts
</body>
</html>
