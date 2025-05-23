<div>
    <h2>Add Product</h2>
</div>
<hr>
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col-lg-8">
            <div class="profile-section">
                @csrf
                <div class="form-group">
                    <label for="username">name</label>
                    <input type="text" name="name" id="" value="">
                    @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
                </div>
                <div class="form-group">
                    <label for="email">Price</label>
                    <input type="text" name="price" id="" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    @error('price')
            <small class="text-danger">{{ $message }}</small>
        @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Descrition</label>
                    <input type="text" name="description" id="" value="">
                    @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
                </div>

                <div class="form-group">
                    <label for="categories">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="" selected>-- Chọn danh mục --</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
                </div>

                <div style="margin-top: 20px;">
                    <button type="submit" class="save-btn">Save</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="avatar-wrapper">
                <img src="" alt="" id="avatar-preview" alt="Avatar">
                <br>
                <input type="file" id="avatar-upload" name="image" accept=".jpg,.jpeg,.png">
                @error('image')
            <small class="text-danger">{{ $message }}</small>
        @enderror
                <label for="avatar-upload">Select Image</label>
            </div>
        </div>
    </div>
</form>
