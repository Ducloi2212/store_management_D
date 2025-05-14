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
        <h3>Thêm đánh giá</h3>
        <div class="row">
            <div class="col-lg-12">
                <form action="">
                    
                    <div class="row my-3">
                        <div class="col-lg-12 mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Khu vực">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Họ">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="và Tên">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Số điện thoại">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Email">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <textarea type="text" class="form-control form-control-lg" placeholder="Địa Chỉ" rows="4"></textarea>
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
                        <tr>
                            <th scope="row">
                                <div class="d-flex">
                                    <div class="">
                                        <img src="{{ asset('images/products/phone/ip12pm.jpg') }}" style="width:70px"
                                            alt="image" class="rounded-3">
                                    </div>
                                    <div class="p-3">
                                        <h5>Iphone 12 Pro Max</h5>
                                    </div>
                                </div>
                            </th>
                            <td> 11990000đ</td>
                            <td>
                                <div class="d-flex flex-row mb-3">
                                    <div class="p-1">
                                        <span class="btn btn-light btn-sm"><i class='bx bx-minus'></i></span>
                                        <span class="mx-2"> 01 </span>
                                        <span class="btn btn-light btn-sm"><i class='bx bx-plus'></i></span>
                                    </div>
                                </div>
                            </td>
                            <td>11990000đ</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <!--Payment-->
        <div class="container my-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Thanh toán khi nhận hàng</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault2">Thanh toán bằng thẻ ngân hàng</label>
                    </div>
                </div>
                <div class="col-lg-6 right-actions">
                    <span class="total">Total (1 item): <b>11990000đ</b></span>
                    <a class="btn color text-light rounded-pill">Thanh toán</i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection