<h1>Categories</h1>
<a href="{{ route('admin.categories.create') }}" class="btn color text-dark mb-3" style="border: 1px solid orange">Add</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">
                <h5>Danh Mục</h5>
            </th>
            <th scope="col">
                <h5>Trạng thái</h5>
            </th>
            <th scope="col">
                <h5>Action</h5>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <th>
                <a href="{{ route('admin.categories.edit', $category->id) }}" style=" cursor: pointer;">
                <h5 class="text-dark">{{ $category->name }}</h5>
            </a>
            </th>
            <td>{{ $category-> status }}</td>
            <td>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                    onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này không?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-light"><i class='bx bxs-trash text-danger'></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination-wrapper">
    {{ $categories->appends(request()->all())->links('pagination::bootstrap-5') }}
</div>