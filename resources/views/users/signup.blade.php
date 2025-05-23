@extends('layouts.main')
@push('title')
<title>Sign Up</title>
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
                <h2>Sign Up</h2>
                <form method="POST" action="{{ route('user.postUser') }}">
                    @csrf
                    <input type="text" name="name" id="name" placeholder="Name" class="input-field" />
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
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
                    <button class="login-btn">REGISTER</button>
                </form>
                <p class="signup-text">New to account? <a href="{{route('login')}}">Log In</a></p>
            </div>
        </div>
    </div>
</section>
@endsection