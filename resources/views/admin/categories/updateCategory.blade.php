<div>
    Chi tiết sản phẩm
</div>
<hr>
<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="row">
        <div class="col-lg-8">
            <div class="profile-section">
                <div class="form-group">
                    <label for="username">Tên Danh Mục</label>
                    <input type="text" name="name" id="" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Trạng thái</label>
                    <input type="text" name="status" id="" value="{{ $category->status }}">
                </div>
            
                <div style="margin-top: 20px;">
                    <button type="submit" class="save-btn">Save</button>
                </div>
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