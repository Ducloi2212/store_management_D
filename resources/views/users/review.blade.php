<section class="container">
    <h2>Reviews</h2>
    @if ($product->reviews && $product->reviews->count() > 0)
    @foreach ($product->reviews as $review)
    <div class="row mt-4">
        <div class="col-lg-1 mt-4">
            <img src="{{ $review->user->profile->avatar ?? asset('images/users/user.jpg') }}" class="avatar"
                alt="image">
        </div>
        <div class="col-lg-11 mt-4">
            <div class="review-comment">
                <h4>{{ $review->user->name }}</h4>
                <div>
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6>{{ $review->created_at->diffForHumans() }}</h6>
                        </div>
                        <div>
                            @for ($i = 1; $i <= 5; $i++) <span
                                class="fa fa-star {{ $i <= $review->rating ? 'checked' : '' }}"></span>
                            @endfor
                        </div>
                    </div>
                    <p>{{ $review->comment }}</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @endforeach
    @else
    <p class="text-muted">Chưa có bài đánh giá nào.</p>
    @endif
</section>
@include('users.comment')