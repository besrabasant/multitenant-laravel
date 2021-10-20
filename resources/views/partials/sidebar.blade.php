<?php
?>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <x-jet-application-mark width="36"/>
        <span class="ms-3 h5 fw-bold mb-0">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('application.create') }}" :active="request()->routeIs('application.create')">
            {{ __('Application') }}
        </x-jet-nav-link>
    </ul>
    <hr>
    @auth
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
               id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}"
                         alt="{{ Auth::user()->name }}"/>
                @endif
                <strong class="ms-4">{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
                <li>
                    <!-- Account Management -->
                    <h6 class="dropdown-header small text-muted">
                        {{ __('Manage Account') }}
                    </h6>
                </li>
                <li>
                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>
                </li>
                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <li>
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                    </li>
                @endif
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        {{ __('Log out') }}
                    </x-jet-dropdown-link>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @endauth
</div>
