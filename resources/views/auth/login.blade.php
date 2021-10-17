<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <div class="card-body">

            <x-jet-validation-errors class="mb-3 rounded-0"/>

            @if (session('status'))
                <div class="alert alert-success mb-3 rounded-0" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <x-jet-label value="{{ __('Email') }}"/>

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                 name="email" :value="old('email')" required/>
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Password') }}"/>

                    <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="current-password"/>
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <x-jet-checkbox id="remember_me" name="remember"/>
                        <label class="form-check-label" for="remember_me">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        @if (Route::has('password.request'))
                            <a class="text-muted me-3" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-jet-button>
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="d-flex flex-wrap align-items-center my-3">
                    <div class="flex-grow-1">
                        <hr>
                    </div>
                    <div class="px-3">
                        or
                    </div>
                    <div class="flex-grow-1">
                        <hr>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="{{route('register')}}" class="text-muted h5 mb-0">
                        Create new account
                    </a>
                </div>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
