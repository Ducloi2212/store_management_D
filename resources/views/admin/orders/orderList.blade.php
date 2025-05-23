<h1>Orders</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">
                <h5>Name</h5>
            </th>
            <th scope="col">
                <h5>Total</h5>
            </th>
            <th scope="col">
                <h5>Status</h5>
            </th>
            <th scope="col">
                <h5>Action</h5>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <th>
                <a href="{{ route('admin.orders.show', $order->user->id) }}" style=" cursor: pointer;">
                <h5 class="text-dark">{{ $order->user->name }}</h5>
            </a>
            </th>
            <td>{{ number_format($order->total) }}đ</td>
            <td>{{ $order->status }}</td>
            <td>
                <form action="{{ route('admin.orders.destroy', $order->user->id) }}" method="POST"
                    onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng này không?');">
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
    {{ $orders->appends(request()->all())->links('pagination::bootstrap-5') }}
</div>