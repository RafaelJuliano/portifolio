@extends('layouts.app')

@section('content')

<div class="container dark">
    <div class='form-container'>
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email" >{{ __('E-Mail Address') }}</label>
            <input id="email" type="email"  @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" @error('password') is-invalid @enderror name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit" class="submit">
                {{ __('Login') }}
            </button>

        </form>
    </div>            
</div>
@endsection
