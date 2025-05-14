@extends('layouts.main')
@push('title')
<title>{{$product -> name}}</title>
@endpush
@push('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<div class="container-fluid bg-light p-5">
    <h1 class="text-center text-secondary"><i class='bx bxs-layer'></i> Thông tin Sản Phẩm</h1>
</div>
<div class="container-product">
    <div class="row">
        <div class="product-image col-4">
            <img src="{{ asset($product->image) }}" alt="Metal Build 1/72 Duke Of Wei Guo Gong">
        </div>

        <div class="product-info col-6">
            <div class="product-details">
                <h1>{{$product -> name}}</h1>
                <div class="price">
                    <span>{{$product -> price}} đ</span> <span class="old-price"></span>
                </div>
                <div class="shipping">
                    {{$product -> description}}
                </div>
                <div class="">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <p>4.1 average based on 254 reviews.</p>
                </div>

                <div class="">
                    <button class="addcart-btn mt-4"><i class='bx bx-cart-add'></i> Add to Cart</button>
                    <button class="buy-btn mt-4">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="container">
    <hr>
    @include('users.review')
</section>


<section class="container mt-4">
    <div class="d-flex">
        <div class="flew-grow-1">
            <h3>Sản phẩm liên quan</h3>
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100 card-custom-rounded product-card">

                <img src="{{ asset($product->image) }}" class="card-img-top" alt="image">
                <div class="card-body">
                    <h6 class="card-title">{{ $product->name }}</h6>
                    <p class="text-danger fw-bold mb-1">{{ $product->price }} ₫</p>
                    <div class="text-warning mb-1">
                        ★★★★★ (0 đánh giá)
                    </div>
                    <span class="badge bg-secondary">Trả góp 0%</span>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</section>
@endsection