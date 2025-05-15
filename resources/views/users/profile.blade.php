@extends('layouts.main')
@push('title')
<title>Profile</title>
@endpush
@push('link')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<section class="container">
    @include('users.sidebar')
    <div class="profile-content">
        <div>
            My Profile
            <p>Manage and protect your account</p>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-8">
                <div class="profile-section">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" value="kandinh123" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" value="Đinh Đức Lợi">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" value="di********@gmail.com" disabled>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="gender-group">
                            <label><input type="radio" name="gender" checked> Male</label>
                            <label><input type="radio" name="gender"> Female</label>
                            <label><input type="radio" name="gender"> Other</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="text" id="dob" value="**/**/2004">
                    </div>
                    <div style="margin-top: 20px;">
                        <button class="save-btn">Save</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="avatar-wrapper">
                    <img src="{{asset('images/users/gaming.jpg')}}" id="avatar-preview" alt="Avatar">
                    <input type="file" id="avatar-upload" accept=".jpg,.jpeg,.png">
                    <label for="avatar-upload">Select Image</label>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script src="{{asset('js/script.js')}}"></script>
@endpush