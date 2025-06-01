<section>
    @if(auth()->check())
    <form action="{{ route('product.review') }}" method="POST">
        @csrf
        <div class="row mt-4">
            <h4>Comment</h4>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="rating" id="rating-value" value="0">
            <div class="col-lg-1 mt-4">
                <img src="{{ $user->profile && $user->profile->avatar ? asset($user->profile->avatar) : asset('images/users/user.jpg') }}"
                    class="avatar" alt="image">
            </div>
            <div class="col-lg-11 mt-4">
                <div class="review-comment">
                    <h4> {{ $user->name }} </h4>
                    <div>
                        <div class="d-flex">
                            <div class="form-text">Bạn đánh giá sản phẩm này?*
                                <div class="star-rating mb-2">
                                    @for ($i = 1; $i <= 5; $i++) 
                                        <span class="fa fa-star" data-value="{{ $i }}"></span>
                                    @endfor
                                    <strong id="rating-text" class="mx-3"></strong>
                                    @error('rating')
                                        <small id="rating-error" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea type="text" name="comment" class="form-control form-control-lg" placeholder="Bình luận"
                                rows="2"></textarea>
                            @error('comment')
                                <small id="comment-error" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                         <button class="btn color text-dark" type="submit" style="border: 1px solid orange">Submit a Review</button>
                    </div>
                </div>
            </div>
    </form>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    </div>
    @else
    <p class="text-muted">Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để đánh giá sản phẩm.</p>
    @endif
</section>