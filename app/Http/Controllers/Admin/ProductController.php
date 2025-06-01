<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $query = Product::with('category');
        $products = Product::all();
        $user = auth()->user();
        $products = Product::with('category')->get();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhereHas('category', function ($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%");
                });
            });
        }

        $products = $query->paginate(10);

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
            'image' => 'required|image|max:5120',
            'category_id' => 'required|exists:categories,id',
        ],[
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'price.required' => 'Vui lòng nhập giá sản phẩm.',
            'image.required' => 'Vui lòng thêm ảnh sản phẩm.',
            'price.numeric' => 'Giá phải là số.',
            'image.image' => 'File phải là ảnh.',
            'image.max' => 'Ảnh không được vượt quá 5MB.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục chọn không tồn tại.',
        ]);

        
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $filename);
            $data['image'] = 'images/products/' . $filename;
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
            $image->move(public_path('images/products'), $filename);
            $data['image'] = 'images/products/' . $filename;
        }

        if ($request->filled('updated_at')) {
        $clientUpdatedAt = Carbon::parse($request->input('updated_at'));
        $serverUpdatedAt = $product->updated_at;

        if (!$clientUpdatedAt->eq($serverUpdatedAt)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Dữ liệu đã bị chỉnh sửa. Vui lòng tải lại trước khi cập nhật.');
        }
    }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
}