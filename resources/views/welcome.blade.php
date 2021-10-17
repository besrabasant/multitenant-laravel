<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">

    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }
    </style>
    <!-- Scripts -->
    <script src="{{ mix('js/main.js') }}" defer></script>
</head>
<body>
<div class="container-fluid fixed-top p-4">
    <div class="col-12">
        <div class="d-flex justify-content-end">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-muted">
                            <strong>Dashboard</strong>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-muted">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                        @endif
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

<div class="container-fluid my-5 pt-5 px-5">
    <div class="row justify-content-center px-4">
        <div class="col-md-12 col-lg-8">
            <h1 class="display-1 fw-bolder text-center">
                {{ __('Welcome to') }} <br>
                {{  config('app.name', 'Laravel') }}
            </h1>
        </div>
    </div>
    <div class="position-fixed end-0 bottom-0 d-flex justify-content-between mt-3 pe-3 pb-3">
        <div class="text-sm text-muted">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
</div>
</body>
</html>
