@extends('layouts.main')
@push('title')
<title>Profile</title>
@endpush
@push('link')
<link rel="stylesheet" href="{{ asset('css/crud.css') }}">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<section class="container">
    @include('users.sidebar')
    <div class="profile-content">
        @include('admin.categories.addCategory')
    </div>
</section>
@endsection
@push('script')
<script src="{{asset('js/script.js')}}"></script>
@endpush