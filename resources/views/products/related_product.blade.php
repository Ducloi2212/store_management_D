<section class="container mt-4">
    <div class="d-flex">
        <div class="flew-grow-1">
            <h3>Related product</h3>
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100 card-custom-rounded product-card">
                <a class="product-link" href="{{ route('product.detail', ['id' => $product->id]) }}">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="image">
                <div class="card-body">
                    <h6 class="text-dark card-title">{{ $product->name }}</h6>
                    <p class="text-danger fw-bold mb-1">{{ number_format($product->price) }} ₫</p>
                    <div class="text-warning mb-1 star-rating">
                        @php
                        $avg = $product->reviews->avg('rating') ?? 0;
                        $fullStars = floor($avg);
                        $halfStar = ($avg - $fullStars) >= 0.5;
                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                        $reviewCount = $product->reviews->count();
                        @endphp

                        {{-- Hiển thị full sao --}}
                        @for ($i = 0; $i < $fullStars; $i++) 
                            <span class="fa fa-star checked"></span>
                        @endfor

                        {{-- Hiển thị sao nửa nếu có --}}
                        @if ($halfStar)
                            <span class="fa fa-star-half-o checked"></span>
                        @endif

                        {{-- Hiển thị sao trống --}}
                        @for ($i = 0; $i < $emptyStars; $i++) 
                            <span class="fa fa-star"></span>
                        @endfor

                        {{-- Hiển thị số điểm --}}
                        <span class="ms-2">({{ number_format($avg, 1) }})</span>
                    </div>

                    <div>
                        @if($reviewCount > 0)
                            <span class="text-warning">({{ $reviewCount }} đánh giá)</span>
                        @else
                            <span class="text-warning">Chưa có đánh giá nào</span>
                        @endif
                    </div>
                </div>
                </a>
            </div>
        </div>

        @endforeach
    </div>
</section>