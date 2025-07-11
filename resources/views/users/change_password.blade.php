@extends('layouts.main')
@push('title')
<title>Change Password</title>
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
        <div>
            My Profile
            <p>Manage and protect your account</p>
        </div>
        <hr>
        <div class="profile-section">
            <form action="{{ route('user.changePassword') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="username">Current password</label>
                    <input type="password" name="current_password" id="current_password" >
                    @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="email">New password</label>
                    <input type="password" name="new_password" id="new_password">
                    @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="phone">New password confirmation</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" >
                    @error('new_password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div style="margin-top: 20px;">
                    <button class="save-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!--Modal-->
        <div id="confirmModal" class="modal" style="display: none;">
            <div class="modal-content">
                <p>Bạn có chắc muốn xóa tài khoản không?</p>
                <button id="confirmDelete" class="btn btn-red">Xác nhận</button>
                <button id="cancelDelete" class="btn btn-out">Hủy</button>
            </div>
        </div>
        <!--Form delete-->
        <form id="deleteForm" action="{{ route('user.delete', ['id' => Auth::user()->id]) }}" method="POST"
            style="display:none;">
            @csrf
            @method('DELETE')
        </form>

@endsection
@push('script')
<script src="{{asset('js/delete_form.js')}}"></script>
@endpush