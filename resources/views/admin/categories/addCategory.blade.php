<div>
    Thêm sản phẩm
</div>
<hr>
<form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col-lg-8">
            <div class="profile-section">
                @csrf
                <div class="form-group">
                    <label for="username">Tên Danh Mục</label>
                    <input type="text" name="name" id="" value="">
                </div>
                <div class="form-group">
                    <label for="email">Trạng thái</label>
                    <input type="text" name="status" id="" value="">
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