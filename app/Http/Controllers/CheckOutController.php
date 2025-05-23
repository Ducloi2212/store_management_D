<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class CheckOutController extends Controller
{
    public function checkOut(Request $request)
    {
        $user = auth()->user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thanh toán.');
    }

    $cartItems = CartItem::where('user_id', $user->id)->with('product')->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.list')->with('error', 'Giỏ hàng đang trống!');
    }

    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item->product->price * $item->quantity;
    }

    return view('users.check_out', compact('cartItems', 'total'));
    }

    public function processCheckOut(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'note' => 'nullable|string|max:1000',
        ]);

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đặt hàng.');
        }

        // Lấy giỏ hàng từ database
        $cartItems = CartItem::where('user_id', $user->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính tổng tiền
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->product->price * $item->quantity;
        }

        // Tạo đơn hàng
        $order = new Order();
        $order->user_id = $user->id;
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->email = $request->input('email');
        $order->note = $request->input('note');
        $order->total = $totalPrice;
        $order->status = 'pending';
        $order->save();

        // Thêm sản phẩm vào bảng order_items
        foreach ($cartItems as $item) {
            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Xoá giỏ hàng sau khi đặt
        CartItem::where('user_id', $user->id)->delete();

        return redirect()->route('cart.list')->with('success', 'Đặt hàng thành công!');
    }
}