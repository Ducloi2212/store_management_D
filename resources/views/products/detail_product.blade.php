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
                <div class="d-flex flex-row mb-3">
                    <div class="my-1">
                        @php
                            $rating = $averageRating ?? 0;
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($rating >= $i)
                                {{-- Full star --}}
                                <span class="fa fa-star checked"></span>
                            @elseif ($rating >= $i - 0.5)
                                {{-- Half star --}}
                                <span class="fa fa-star-half-o checked"></span>
                            @else
                                {{-- Empty star --}}
                                <span class="fa fa-star"></span>
                            @endif
                        @endfor
                        <strong class="ms-2">({{ number_format($averageRating ?? 0, 1) }}/5)</strong>
                    </div>
                    <div class="p-1 mx-2">
                        <p>({{ $product->reviews->count() }} lượt đánh giá)</p>
                    </div>
                </div>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div class="d-flex flex-row mb-3 mt-4">
                        <div class="p-1 my-2">
                            <h6>Số lượng</h6>
                        </div>
                        <div class="p-1">
                            <span class="btn btn-light"><i class='bx bx-minus'></i></span>
                            <input type="number" name="quantity" value="1" min="1" class="mx-2">
                            <span class="btn btn-light"><i class='bx bx-plus'></i></span>
                        </div>
                    </div>

                    <div class="">
                        <button class="addcart-btn mt-4"><i class='bx bx-cart-add'></i> Add to Cart</button>
                </form>
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


@include('products.related_product')
@push('script')
<script src="{{asset('js/star.js')}}"></script>
@endpush
@endsection