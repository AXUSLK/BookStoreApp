<?php

namespace App\Http\Controllers;

use App\Handlers\CartHandler;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $cartHandler;

    public function __construct(CartHandler $cartHandler)
    {
        $this->cartHandler = $cartHandler;
    }

    /**
     * Show the checkout form
     *
     * @return response()
     */
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        $totalPrice = $this->cartHandler->cartTotal($cart);
        return view('cart.checkout', compact('totalPrice'));
    }
}
