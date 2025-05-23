<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function reviewProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $data = $request->all();

        $review = Review::create([
        'product_id' => $data['product_id'],
        'user_id' => auth()->id(),
        'rating' => $data['rating'],
        'comment' => $data['comment'],
    ]);

        return back()->with('success', 'Cảm ơn bạn đã đánh giá!');
    }
}
