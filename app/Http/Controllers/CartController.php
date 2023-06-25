<?php

namespace App\Http\Controllers;

use App\Handlers\CartHandler;
use App\Models\Product;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartHandler;

    public function __construct(CartHandler $cartHandler)
    {
        $this->cartHandler = $cartHandler;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        $i = 1;
        $cart = session()->get('cart', []);
        $totalPrice = $this->cartHandler->cartTotal($cart);
        return view('cart.cart', compact('totalPrice', 'i'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            return false;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->thumb_image,
                "category" => $product->category?->name,
            ];
        }

        session()->put('cart', $cart);
        return true;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
