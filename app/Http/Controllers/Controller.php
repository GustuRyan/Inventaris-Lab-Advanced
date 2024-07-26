<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Recommend;

abstract class Controller
{
    public function showCart(Request $request)
    {
        $cartData = $request->cartData;

        return view('layouts.dashboard', compact('cartData'));
    }

    
}
