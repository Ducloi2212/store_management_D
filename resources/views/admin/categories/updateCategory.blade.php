<div>
    <h2>Category detail</h2>
</div>
<hr>
<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="updated_at" value="{{ $category->updated_at->toDateTimeString() }}">
        <div class="row">
        <div class="col-lg-8">
            <div class="profile-section">
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" name="name" id="" value="{{ $category->name }}">
                    @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
                </div>
                <div class="form-group">
                    <label for="email">Status</label>
                    <input type="text" name="status" id="" value="{{ $category->status }}">
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