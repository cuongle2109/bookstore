@extends('layouts.guest')

@section('content')
    <main class="block-login">
        <h3>Login</h3>
        <form method="POST" action="{{ route('login.custom') }}">
            @csrf
            <div class="form-group mb-3">
                <input
                    type="text"
                    placeholder="Email"
                    id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    autofocus
                >
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input
                    type="password"
                    placeholder="Password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                >
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            @if(session()->has('message'))
                <div class="alert alert-danger">{{ session()->get('message') }}</div>
            @endif

            <div class="form-group mb-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>

            <div class="d-grid mx-auto mb-3">
                <button type="submit" class="btn btn-primary btn-block btn-login">Signin</button>
            </div>

            <div class="d-flex justify-content-center">
                <span class="me-1">New to page?</span>
                <a href="{{ route('register-user') }}" class="text-center d-block"> Create an account.</a>
            </div>
        </form>
    </main>
@endsection
