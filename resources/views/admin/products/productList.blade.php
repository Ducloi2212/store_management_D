<h1>Danh sách sản phẩm</h1>
<a href="{{ route('admin.products.create') }}" class="btn color text-light mb-3">Thêm sản phẩm</a>

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
                <div class="d-flex">
                    <div class="">
                        <img src="{{ asset($product->image) }}" style="width:70px" alt="image" class="rounded-3">
                    </div>
                    <div class="p-3">
                        <h5>{{ $product->name }}</h5>
                    </div>
                </div>
            </th>
            <td>{{ number_format($product->price) }}đ</td>
            <td>
                {{  \Illuminate\Support\Str::limit($product->description, 20) }}
            </td>
            <td> @if ($product->categories->isNotEmpty())
                @foreach ($product->categories as $category)
                <span class="">{{ $category->name }}</span>
                @endforeach
                @else
                <span class="">Chưa có</span>
                @endif
            </td>
            <td>
                <form action="" method="POST">
                    @csrf
                    <button class="btn btn-light"><i class='bx bxs-trash text-danger'></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>