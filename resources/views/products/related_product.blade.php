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
                    <p class="text-danger fw-bold mb-1">{{ number_format($product->price) }} ₫</p>
                    <div class="text-warning mb-1">
                        @for ($i = 1; $i <= 5; $i++)   
                            @if ($i <=round($averageRating)) 
                                <span class="fa fa-star checked"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif
                        @endfor
                        <strong class="ms-2">({{ number_format($averageRating ?? 0, 1) }}/5)</strong>
                    </div>
                    <span class="badge bg-secondary">Trả góp 0%</span>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</section>