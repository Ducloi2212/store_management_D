<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders','user'));
    }

    public function show(Order $order)
    {
        $user = auth()->user();
        $order->load('items.product');
        return view('admin.orders.show', compact('order','user'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            'status' => $request->status
        ]);
        return redirect()->route('admin.orders.index')->with('success', 'Cập nhật trạng thái thành công!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Xóa đơn hàng thành công!');
    }
}
