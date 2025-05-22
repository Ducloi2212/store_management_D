<section class="container mt-4">
    <h4>IPHONE</h4>
    <div class="row">

        @foreach($products as $product)

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100 card-custom-rounded product-card">
                <a class="product-link" href="{{ route('product.detail', ['id' => $product->id]) }}">
                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h6 class="text-dark card-title">{{ $product->name }}</h6>
                        <p class="text-danger fw-bold mb-1">{{ number_format($product->price) }} ₫</p>
                        <div class="text-warning mb-1">
                            ★★★★★ (0 đánh giá)
                        </div>
                        <span class="badge bg-secondary">Trả góp 0%</span>
                    </div>
                </a>
            </div>
        </div>

        @endforeach

    </div>
</section>