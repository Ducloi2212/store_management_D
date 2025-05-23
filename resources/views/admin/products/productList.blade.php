<h1>Danh sách sản phẩm</h1>
<div class="d-flex justify-content-between align-items-center container-fluid">
    <a href="{{ route('admin.products.create') }}" class="btn color text-light mb-3">Thêm sản phẩm</a>
    <form class=" mx-auto w-50 my-2" action="{{ route('admin.products.index') }}" method="GET" role="search">
        <div class="input-group">
            <button type="submit" class="input-group-text bg-white border-end-0"><i class='bx bx-search fs-3'></i></button>
            <input type="text" name="search" class="form-control border-start-0" placeholder="Tìm kiếm sản phẩm..."
                value="{{ request('search') }}">
        </div>
    </form>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">
                <h5>Product</h5>
            </th>
            <th scope="col">
                <h5>Price</h5>
            </th>
            <th scope="col">
                <h5>Description</h5>
            </th>
            <th scope="col">
                <h5>Category</h5>
            </th>
            <th scope="col">
                <h5>Action</h5>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <th scope="row">
                <a href="{{ route('admin.products.edit', $product->id) }}" style=" cursor: pointer;">
                    <div class="d-flex">
                        <div class="">
                            <img src="{{ asset($product->image) }}" style="width:70px" alt="image" class="rounded-3">
                        </div>
                        <div class="p-3">
                            <h5 class="text-dark">{{ $product->name }}</h5>
                        </div>
                    </div>
                </a>
            </th>
            <td>{{ number_format($product->price) }}đ</td>
            <td>
                {{  \Illuminate\Support\Str::limit($product->description, 20) }}
            </td>
            <td>{{ $product->category?->name ?? 'Chưa có danh mục' }}</td>
            </td>
            <td>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                    onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này không?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-light"><i class='bx bxs-trash text-danger'></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>