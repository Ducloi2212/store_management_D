<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;

class CartController extends Controller
{
    public function cartList(Request $request)
    {
        if (!auth()->check()) {
        // Nếu chưa đăng nhập thì redirect yêu cầu đăng nhập hoặc dùng session (tùy bạn)
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng');
    }

    $userId = auth()->id();

    // Lấy cart item của user, kèm thông tin sản phẩm
    $cartItems = CartItem::with('product')->where('user_id', $userId)->get();

    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item->product->price * $item->quantity;
    }

    return view('users.cart_list', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request)
    {

        $product_id = $request->input('product_id');
        $quantity = (int) $request->input('quantity', 1);

        if (auth()->check()) {
        $existing = CartItem::where('user_id', auth()->id())
                            ->where('product_id', $product_id)
                            ->first();

        if ($existing) {
            $existing->quantity += $quantity;
            $existing->save();
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
        }
    } else {
        $cart = session()->get('cart', []);
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            $product = Product::find($product_id);
            $cart[$product_id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity
            ];
        }
        session()->put('cart', $cart);
    }

        return redirect()->route('cart.list')->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function removeItem($productId)
    {
        if (auth()->check()) {
            CartItem::where('user_id', auth()->id())
                    ->where('product_id', $productId)
                    ->delete();
        } else {
            // Nếu có dùng session cho user chưa đăng nhập, thì xóa trong session
            $cart = session()->get('cart', []);
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart.list')->with('success', 'Đã xoá sản phẩm khỏi giỏ hàng!');
    }

    public function updateQuantity(Request $request, $id)
    {
        $action = $request->input('action'); // 'increase' hoặc 'decrease'

        $cartItem = CartItem::where('user_id', auth()->id())
                    ->where('product_id', $id)
                    ->first();

        if (!$cartItem) {
            return redirect()->route('cart.list')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng');
        }

        if ($action === 'increase') {
            $cartItem->quantity++;
        } elseif ($action === 'decrease') {
            $cartItem->quantity--;
            if ($cartItem->quantity <= 0) {
                $cartItem->delete();
                return redirect()->route('cart.list')->with('success', 'Đã xoá sản phẩm khỏi giỏ hàng');
            }
        }

        $cartItem->save();

        return redirect()->route('cart.list')->with('success', 'Đã cập nhật giỏ hàng');
    }
}