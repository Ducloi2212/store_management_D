@extends('layouts.error')

@section('title', 'Trang không tồn tại')

@section('content')
    <div class="container">
        <h1 class="">Trang không tồn tại</h1>
        <p>trang truy cập không tồn tại!</p>
        <a href="{{ route('home') }}"class="btn color " style="border: 1px solid orange">Quay lại trang chủ</a>
    </div>
    @endsection