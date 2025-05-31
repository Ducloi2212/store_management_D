<h1>Order Item</h1>
<div class="form-group">
    <label for="username"> Name: {{$order->name}} </label>
</div>

<div class="form-group">
    <label for="username"> Quantity: {{ number_format($order->total) }}đ</label>
</div>
<form action="{{ route('admin.orders.update', $order->id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="updated_at" value="{{ $order->updated_at->toDateTimeString() }}">
    <div class="form-group">
        <label for="categories">Status</label>
        <select name="status" class="form-control">
            @foreach (['pending', 'shipped', 'delivered'] as $status)
            <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn color text-light mb-3">Save</button>
</form>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
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
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <th scope="row">
                <div class="d-flex">
                    <div class="">
                        <img src="{{ asset($item->product->image) }}" style="width:70px" alt="image" class="rounded-3">
                    </div>
                    <div class="p-3">
                        <h5 class="text-dark">{{ $item->product->name }}</h5>
                    </div>
                </div>
            </th>
            <td>{{ number_format($item->product->price) }}đ</td>
            <td>
                {{  \Illuminate\Support\Str::limit($item->product->description, 20) }}
            </td>
            <td>{{ $item->product->category?->name ?? 'Chưa có danh mục' }}</td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>