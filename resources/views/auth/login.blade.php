@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh; padding: 20px;">
    <div class="auth-card" style="width: 100%; max-width: 440px;">
        <h2><i class="fas fa-lock"></i> {{ __('Admin Login') }}</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>
                <div style="position: relative;">
                    <i class="fas fa-envelope" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #0f4a2a; font-size: 1rem;"></i>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="admin@example.com" required autocomplete="email" autofocus
                           style="padding-left: 40px;">
                </div>
                @error('email')
                    <span class="error-text" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <div style="position: relative;">
                    <i class="fas fa-lock" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #0f4a2a; font-size: 1rem;"></i>
                    <input id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password"
                           style="padding-left: 40px;">
                </div>
                @error('password')
                    <span class="error-text" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="checkbox-group">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">{{ __('Remember Me') }}</label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center;">
                <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <div style="text-align: center; margin-top: 20px;">
                    <a href="{{ route('password.request') }}" style="color: var(--gold); text-decoration: none; font-weight: bold; font-size: 0.85rem;">
                        <i class="fas fa-question-circle"></i> {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
