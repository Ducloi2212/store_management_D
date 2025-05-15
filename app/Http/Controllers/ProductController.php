<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function productDetail(Request $request) {
        $products = product::all();
        $product_id = $request->get('id');
        $product = product::find($product_id);

       $data = [
           'product' => $product,
           'products' => $products
       ];

        return view('products.detail_product', $data);
    }
}
