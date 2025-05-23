@extends('layouts.main')
@push('title')
<title>Order</title>
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
            Order
            <p>Manage and protect your account</p>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <h5>ID</h5>
                            </th>
                            <th scope="col">
                                <h5>Status</h5>
                            </th>
                            <th scope="col">
                                <h5>Total</h5>
                            </th>
                            <th scope="col">
                                <h5>Date</h5>
                            </th>
                            <th scope="col">
                                <h5>Action</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th scope="row">
                                    {{ $order->id }}
                            </th>
                            <td>
                                {{ ucfirst($order->status) }}
                            </td>
                            <td>
                                {{ number_format($order->total, 0, ',', '.') }}₫
                            </td>
                            <td>
                                {{ $order->created_at->format('d/m/Y') }}
                            </td>
                            <td>
                                <a class="a" href="{{ route('orders.detail', ['id' => $order->id]) }}">Xem chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script src="{{asset('js/script.js')}}"></script>
@endpush