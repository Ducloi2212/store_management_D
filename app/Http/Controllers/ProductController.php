<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;

class ProductController extends Controller
{
    public function productDetail(Request $request) {
        $products = product::all();
        $product_id = $request->get('id');
        $product = product::find($product_id);
        $product = product::with('reviews.user')->find($product_id);
        $user = auth()->user(); 

       $data = [
           'product' => $product,
           'products' => $products,
           'user' => $user
       ];

        return view('products.detail_product', $data);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->get();

        return view('products.search_results', compact('products', 'query'));
    }
}
