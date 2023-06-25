<?php

use App\Handlers\CartHandler;

if (!function_exists('cart_total')) {
    function cart_total($cart)
    {
        return app(CartHandler::class)->cartTotal($cart);
    }
}
