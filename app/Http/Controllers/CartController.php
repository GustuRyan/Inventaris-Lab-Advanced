<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        \Log::info('Request Data:', $request->all());

        try {
            $amount = $request->input('amount', 1); // Default amount to 1 if not provided

            $cart = Cart::where('user_id', auth()->id())
                ->where(function ($query) use ($request) {
                    if ($request->type == 'material') {
                        $query->where('material_id', $request->item_id)
                            ->where('tool_id', 0);
                    } else {
                        $query->where('tool_id', $request->item_id)
                            ->where('material_id', 0);
                    }
                })
                ->first();

            if ($cart) {
                \Log::info('Updating existing cart item');
                $cart->update(['amount' => \DB::raw('amount + ' . $amount)]);
            } else {
                \Log::info('Adding new item to cart');
                $cart = Cart::create([
                    'user_id' => auth()->id(),
                    'material_id' => ($request->type == 'material') ? $request->item_id : 0,
                    'tool_id' => ($request->type == 'material') ? 0 : $request->item_id,
                    'amount' => $amount,
                ]);
            }

            \Log::info('Item added/updated to cart successfully');
            return response()->json(['success' => 'Item added/updated to cart successfully']);


        } catch (\Exception $e) {
            \Log::error('Error adding item to cart: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while adding item to cart'], 500);
        }
    }


}
