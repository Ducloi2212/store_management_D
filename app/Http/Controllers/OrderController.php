<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class OrderController extends Controller
{
    public function ordersUser($id)
    {
        $user = User::with('profile')->findOrFail($id);
        $orders = Order::where('user_id', $id)->with('orderItems')->latest()->get();
        return view('orders.order', compact('orders', 'user'));
    }

    public function orderDetail($id)
    {
        $order = Order::with(['orderItems.product', 'user.profile'])->findOrFail($id);

    if ($order->user_id !== auth()->id()) {
        abort(403, 'Bạn không có quyền xem đơn hàng này.');
    }
        return view('orders.orderDetail', [
        'order' => $order,
        'user' => $order->user,
        ]);
    }
}
