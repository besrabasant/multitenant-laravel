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
    {{ $slot }}
@endsection

