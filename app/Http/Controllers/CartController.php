<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList(Request $request)
    {
        return view('users.cart_list');
    }
}
