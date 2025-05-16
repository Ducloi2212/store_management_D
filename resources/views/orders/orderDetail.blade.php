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
        <div>
            Order
            <p>Manage and protect your account</p>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    @if ($order->orderItems && $order->orderItems->count() > 0)
                    <thead>
                        <tr>
                            <th scope="col">
                                <h5>Product</h5>
                            </th>
                            <th scope="col">
                                <h5>Price</h5>
                            </th>
                            <th scope="col">
                                <h5>Quantity</h5>
                            </th>
                            <th scope="col">
                                <h5>Subtotal</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                        <tr>
                            <th scope="row">
                                <div class="d-flex">
                                    <div class="">
                                        <img src="{{ asset('images/products/phone/ip12pm.jpg') }}" style="width:70px"
                                            alt="image" class="rounded-3">
                                    </div>
                                    <div class="p-3">
                                        <h5>{{ $item->product->name ?? 'Sản phẩm không tồn tại' }}</h5>
                                    </div>
                                </div>
                            </th>
                            <td>{{ number_format($item->price) }}đ</td>
                            <td>
                                {{ $item->quantity }}
                            </td>
                            <td>{{ number_format($item->price * $item->quantity) }}đ</td>
                        </tr>
                        @endforeach
                        @else
                        <p>Không có sản phẩm trong đơn hàng.</p>
                        @endif
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