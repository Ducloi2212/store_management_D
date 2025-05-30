@extends('layouts.error')

@section('content')
    <div class="container">
        <h1 class="text-danger">Truy cập bị từ chối</h1>
        <p>Bạn không có quyền truy cập vào trang này.</p>
        <a href="{{ route('home') }}"class="btn color " style="border: 1px solid orange">Quay lại trang chủ</a>
    </div>
@endsection