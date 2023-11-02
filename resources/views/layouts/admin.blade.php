<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/an-function.js'])
    @stack('style')
</head>
<body>
    <div id="app">
        @include('layouts.admin-nav')
        @include('layouts.admin-sidenav')
        <div id="app-content" class="bg-slate-50">
            @yield('content')
        </div>
    </div>
    @stack('script')
</body>
</html>
