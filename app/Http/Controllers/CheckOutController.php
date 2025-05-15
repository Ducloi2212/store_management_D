<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function checkOut(Request $request)
    {
        return view('users.check_out');
    }
}
