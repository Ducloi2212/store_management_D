@extends('layouts.main')
@push('title')
<title>Cart</title>
@endpush
@push('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<div class="container-fluid bg-light p-5">
    <h1 class="text-center text-secondary"><i class='bx bxs-cart'></i>Shopping Cart</h1>
</div>
<!--Cart List-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($cartItems->isEmpty())
                    <p>Giỏ hàng của bạn đang trống.</p>
                @else
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
                        @foreach($cartItems as $item)
                        <tr>
                            <th scope="row">
                                <div class="d-flex">
                                    <div class="">
                                        <img src="{{ asset($item->product->image) }}" style="width:70px" alt="image"
                                            class="rounded-3">
                                    </div>
                                    <div class="p-3">
                                        <h5>{{ $item->product->name }}</h5>
                                    </div>
                                </div>
                            </th>
                            <td> {{ number_format($item->product->price) }}đ</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="p-1">
                                        <form action="{{ route('cart.updateQuantity', $item->product->id) }}" method="POST"
                                            class="d-flex align-items-center">
                                            @csrf
                                            <input type="hidden" name="action" value="decrease">
                                            <button type="submit" name="action" value="decrease"
                                                class="btn btn-outline-warning btn-sm"><i class='bx bx-minus'></i></button>

                                            <span class="mx-3">{{ $item->quantity }}</span>

                                            <button type="submit" name="action" value="increase"
                                                class="btn btn-outline-warning btn-sm"><i class='bx bx-plus'></i></button>
                                        </form> 
                                    </div>
                                </div>
                            </td>
                            <td>{{ number_format($item->product->price * $item->quantity) }}đ</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->product->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-light"><i class='bx bxs-trash text-danger'></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                <span class="total">Total (1 item): <b>{{ number_format($total) }}đ</b></span>
                <a href="{{route('cart.checkOut')}}" class="checkout-btn">Check Out</a>
            </div>
        </div>
    </div>
</section>
@endsection