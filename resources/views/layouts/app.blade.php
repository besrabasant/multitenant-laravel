@extends('layouts.base')

@push('fonts')
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
    @livewireStyles
@endpush

@push('scripts')
    <script src="{{ mix('js/main.js') }}" defer></script>
@endpush

@section('content')
    <div class="d-flex">
        @include('partials.sidebar')

        <div class="flex-grow-1 flex-shrink-1 overflow-auto" style="height: 100vh; padding-top: 85px;">
            <x-jet-banner/>
{{--            @livewire('navigation-menu')--}}
            <!-- Page Heading -->
            <header class="d-flex py-3 bg-white shadow-sm border-bottom fixed-top" style="left: 280px;">
                <div class="container-fluid px-4">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="container-fluid my-3 px-4">
                {{ $slot }}
            </main>
        </div>
    </div>
@endsection

@push('footer_contents')
    @stack('modals')
@endpush

@push('footer_scripts')
    @livewireScripts
@endpush
