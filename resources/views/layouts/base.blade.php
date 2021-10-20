<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
@stack('fonts')

<!-- Styles -->
@stack('styles')

<!-- Scripts -->
    @stack('scripts')
</head>
<body class="font-sans antialiased bg-light">
<div>
    @yield('content')
</div>

@stack('footer_contents')

@stack('footer_scripts')
@env('local')
    <script src="http://localhost:35729/livereload.js"></script>
@endenv
</body>
</html>
