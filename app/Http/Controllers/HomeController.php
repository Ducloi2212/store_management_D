<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $products = Product::with('reviews')->paginate(8);
        $products_rating = Product::with('reviews')->get();
        $categories = Category::all();

        foreach ($products_rating as $product) {
        $product->averageRating = $product->reviews->avg('rating');
    }
        return view('home', ['products' => $products, 'categories' => $categories]);
    }
}