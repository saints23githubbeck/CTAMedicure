<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Medicure') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/app.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link rel = "stylesheet" href="/css/bootstrap.min.css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body style="background-color: #e3e3e3; height: 100%">
    <div id="app">
        <main class="py-4">
            @yield('content')x
        </main>
    </div>
</body>
</html>
