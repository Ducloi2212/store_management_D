@extends('layouts.main')
@push('title')
<title>Cart</title>
@endpush
@push('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<div class="container-fluid bg-light p-5">
    <h1 class="text-center text-secondary"><i class='bx bxs-cart'></i> Giỏ hàng</h1>
</div>
<!--Cart List-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (count($cart) > 0)
                <table class="table">
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
                            <th scope="col">
                                <h5>Remove</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                        <tr>
                            <th scope="row">
                                <div class="d-flex">
                                    <div class="">
                                        <img src="{{ asset($item->image) }}" style="width:70px"
                                            alt="image" class="rounded-3">
                                    </div>
                                    <div class="p-3">
                                        <h5>{{ $item->name }}</h5>
                                    </div>
                                </div>
                            </th>
                            <td> {{ number_format($item->price) }}đ</td>
                            <td>
                                <div class="d-flex flex-row mb-3">
                                    <div class="p-1">
                                        <span class="btn btn-light btn-sm"><i class='bx bx-minus'></i></span>
                                        <span class="mx-2"> {{ $item->quantity }} </span>
                                        <span class="btn btn-light btn-sm"><i class='bx bx-plus'></i></span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ number_format($item->price * $item->quantity) }}đ</td>
                            <td><a href="" class="btn btn-light"><i class='bx bxs-trash text-danger'></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Giỏ hàng trống!!</p>
                @endif
            </div>
        </div>
        <!--Cart footer-->
        <div class="cart-footer">
            <div class="left-actions">
                <input type="checkbox" id="select-all">
                <label for="select-all">Select All (1)</label>
                <button class="delete">Delete</button>
            </div>
            <div class="right-actions">
                <span class="total">Total (1 item): <b>11990000đ</b></span>
                <a href="{{route('cart.checkOut')}}" class="checkout-btn">Check Out</a>
            </div>
        </div>
    </div>
</section>
@endsection