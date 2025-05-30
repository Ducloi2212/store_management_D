@extends('layouts.main')

@section('title', 'Trang không tồn tại')

@section('content')
    <div class="text-center py-5">
        <h1 class="display-4"></h1>
        <p class="lead">Rất tiếc, trang bạn yêu cầu không tồn tại.</p>
        <a href="{{ route('home') }}" class="btn color " style="border: 1px solid orange">Quay lại trang chủ</a>
    </div>
    @endsection