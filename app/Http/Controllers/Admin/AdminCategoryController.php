<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
{
    $user = auth()->user();
    $categories = Category::paginate(10);
    return view('admin.categories.index', compact('categories','user'));
}

public function create()
{
    $user = auth()->user();
    return view('admin.categories.create',compact('user'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|string',
    ], [
        'name.required' => 'Vui lòng nhập tên danh mục.',
        'name.string' => 'Tên danh mục phải là chuỗi.',
        'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
        'status.required' => 'Vui lòng chọn trạng thái.',
        'status.string' => 'Trạng thái không hợp lệ.',
    ]);

    Category::create($request->only('name','status'));

    return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công');
}

public function edit(Category $category)
{
    $user = auth()->user();
    return view('admin.categories.edit', compact('category','user'));
}

public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|string',
    ],
    [
        'name.required' => 'Vui lòng nhập tên danh mục.',
        'name.string' => 'Tên danh mục phải là chuỗi.',
        'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
        'status.required' => 'Vui lòng chọn trạng thái.',
        'status.string' => 'Trạng thái không hợp lệ.',
    ]);
    $category->update($request->only('name','status'));

    return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công');
}

public function destroy(Category $category)
{
    $category->delete();

    return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công');
}
}