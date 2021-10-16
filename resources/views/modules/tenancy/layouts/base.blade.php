<?php
?>
@extends('layouts.base')

@push('fonts')
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        @yield('tenancy.base.content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
