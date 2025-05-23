<div>
    <h2>Add Category</h2>
</div>
<hr>
<form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col-lg-8">
            <div class="profile-section">
                @csrf
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" name="name" id="" value="">
                    @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
                </div>
                <div class="form-group">
                    <label for="email">Status</label>
                    <input type="text" name="status" id="" value="">
                    @error('status')
            <small class="text-danger">{{ $message }}</small>
        @enderror
                </div>

                <div style="margin-top: 20px;">
                    <button type="submit" class="save-btn">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
