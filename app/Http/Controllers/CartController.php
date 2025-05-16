<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function cartList(Request $request)
    {
        $cart = session()->get('cart', []);

        $cartObjects = array_map(function($item) {
            return (object) $item;
        }, $cart);

        return view('users.cart_list', ['cart' => $cartObjects]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = (int) $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.list')->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }
}