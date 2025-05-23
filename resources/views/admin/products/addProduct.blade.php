<div>
    Thêm sản phẩm
</div>
<hr>
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col-lg-8">
            <div class="profile-section">
                @csrf
                <div class="form-group">
                    <label for="username">Tên sản phẩm</label>
                    <input type="text" name="name" id="" value="">
                </div>
                <div class="form-group">
                    <label for="email">Giá</label>
                    <input type="text" name="price" id="" value="">
                </div>
                <div class="form-group">
                    <label for="phone">Mô tả</label>
                    <input type="text" name="description" id="" value="">
                </div>

                <div class="form-group">
                    <label for="categories">Danh mục</label>
                    <select name="category_id" class="form-control">
                        <option value="" selected>-- Chọn danh mục --</option>
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
                <img src="" alt="" id="avatar-preview" alt="Avatar">
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