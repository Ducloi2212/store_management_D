@extends('layouts.main')
@push('title')
<title>Check Out</title>
@endpush
@push('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<div class="container-fluid bg-light p-5">
    <h1 class="text-center text-secondary"><i class='bx bxs-cart'></i> Thanh toán </h1>
</div>
<!--Billing Detail-->
<section>
    <div class="container my-5 bg-light">
        <h3>Thông tin người nhận</h3>
        <div class="row">
            <div class="col-lg-12">
                <form action="">

                    <div class="row my-3">
                        <form action="{{ route('cart.checkout.process') }}" method="POST">
                            @csrf
                            <div class="col-lg-6 mb-3">
                                <input type="text" name="name" class="form-control form-control-lg" placeholder="" value="{{ old('name', auth()->user()->name ?? '') }}" disable>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="phone" class="form-control form-control-lg" placeholder="" value="{{ old('name', auth()->user()->phone ?? '') }}">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="" value="{{ old('name', auth()->user()->email ?? '') }}">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="address" class="form-control form-control-lg" placeholder="" value="{{ old('name', auth()->user()->address ?? '') }}">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <textarea type="text" name="note" class="form-control form-control-lg" placeholder="Ghi chú"
                                    rows="4"></textarea>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--Cart List-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $id => $item)
                        <tr>
                            <th scope="row">
                                <div class="d-flex">
                                    <div class="">
                                        <img src="{{ asset($item['image']) }}" style="width:70px"
                                            alt="image" class="rounded-3">
                                    </div>
                                    <div class="p-3">
                                        <h5>{{ $item['name'] }}</h5>
                                    </div>
                                </div>
                            </th>
                            <td> {{ number_format($item['price']) }}đ</td>
                            <td>
                                <div class="d-flex flex-row mb-3">
                                    <div class="p-1">
                                        <span class="mx-2"> {{ $item['quantity'] }} </span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ number_format($item['price'] * $item['quantity']) }}đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <!--Payment-->
        <div class="container my-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault1"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">Thanh toán khi nhận hàng</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault2">Thanh toán bằng thẻ ngân hàng</label>
                    </div>
                </div>
                <div class="col-lg-6 right-actions">
                    <span class="total">Total (1 item): <b>{{ number_format($total) }}đ</b></span>
                    <button class="btn color text-light rounded-pill">Thanh toán</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection