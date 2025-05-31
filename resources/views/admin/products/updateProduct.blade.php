<div>
    <h2>Update Product</h2>
</div>
<hr>
<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="updated_at" value="{{ $product->updated_at->toDateTimeString() }}">
        <div class="row">
        <div class="col-lg-8">
            <div class="profile-section">
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" name="name" id="" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Price</label>
                    <input type="text" name="price" id="" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="phone">Decription</label>
                    <input type="text" name="description" id="" value="{{ $product->description }}">
                </div>

                <div class="form-group">
                    <label for="categories">Category</label>
                    <select name="category_id" class="form-control">
                        @if($product->category_id == 0 || $product->category_id == "")
                        <option value="0" selected>--Chọn Danh Mục--</option>
                        @else
                        <option value="{{ $product->category_id }}" selected>{{ $product->category->name }}</option>
                        @endif
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-top: 20px;">
                    <button type="submit" class="save-btn">Save</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="avatar-wrapper">
                <img src="{{ asset($product->image) }}" alt="" id="avatar-preview" alt="Avatar">
                <br>
                <input type="file" id="avatar-upload" name="image" accept=".jpg,.jpeg,.png">
                <label for="avatar-upload">Select Image</label>
            </div>
        </div>
    </div>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif