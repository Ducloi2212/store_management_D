@extends('layouts.main')
@push('title')
<title>Log In</title>
@endpush
@push('link')
<link rel="stylesheet" href="{{ asset('css/crud.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<section class="login-container">
    <div class="row">
        <div class="col-lg-8">
            <div class="product-image box-image">
                <img src="{{ asset('images/store-974-moq-peripherals.jpg') }}"
                    alt="Metal Build 1/72 Duke Of Wei Guo Gong">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="login-box">
                <h2>Log In</h2>
                <form method="POST" action="{{ route('user.authUser') }}">
                    @csrf
                    <input type="email" name="email" id="email" placeholder="Email" class="input-field" />
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="password-field">
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="input-field" />
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <button class="login-btn">LOG IN</button>
                </form>
                <a href="#" class="forgot">Forgot Password</a>

                <p class="signup-text">New to account? <a href="{{route('user.create')}}">Sign Up</a></p>
            </div>
        </div>
    </div>
</section>
@endsection