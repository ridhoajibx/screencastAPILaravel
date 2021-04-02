<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\CartResource;
use App\Models\Screencast\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return CartResource::collection(Auth::user()->carts()->with('playlist', 'user')->latest()->get());
    }
    public function store(Playlist $playlist)
    {
        if (!Auth::user()->alreadyInCart($playlist)) {
            Auth::user()->addToCart($playlist);

            return response()->json(['message' => "Playlist is added to cart!"], 200);
        }
        return response()->json(['message' => "Playlist is already added to cart!"], 405);
    }
}
