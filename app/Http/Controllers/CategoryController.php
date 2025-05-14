<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categoryProduct(Request $request) {
        $categories = Category::all();
        $category_id = $request->get('id');
        $category = Category::find($category_id);

       $data = [
           'category' => $category,
           'products' => $category->products,
           'categories' => $categories
       ];

        return view('categories.product_list', $data);
    }
}
