<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS files -->
    <link href="{{ asset('backend/dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/dist/css/demo.min.css') }}" rel="stylesheet"/>

    <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app" class="wrapper">
    @include('layouts.backend.partials.sidebar')
    @include('layouts.backend.partials.header')

    <div class="page-wrapper">
        @yield('content')
        @include('layouts.backend.partials.footer')
    </div>
</div>
<!-- Tabler Core -->
<script src="{{ asset('backend/dist/js/tabler.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/demo.min.js') }}"></script>
</body>
</html>
