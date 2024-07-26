<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Cart;

class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $userId = auth()->id();
        
        // Ambil data cart berdasarkan user ID
        $cartData = Cart::where('user_id', $userId)->get();
        
        // Tambahkan data cart ke dalam request
        $request->merge(['cartData' => $cartData]);

        return $next($request);
    }
}
