<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $products = Product::all();
        $user = auth()->user();
        $products = Product::with('category')->get();

        return view('admin.products.index', compact('products', 'user'));
    }

    public function create()
    {
        $user = auth()->user();
        $categories = Category::all();
        return view('admin.products.create', compact( 'categories', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products/laptop'), $filename);
            $data['image'] = 'images/products/laptop/' . $filename;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit(Product $product)
    {
        $user = auth()->user();
        $categories = Category::all();
        return view('admin.products.edit', compact( 'product', 'categories', 'user'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products/laptop'), $filename);
            $data['image'] = 'images/products/laptop/' . $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }
}
