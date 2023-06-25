<?php

namespace App\Http\Controllers;

use App\Handlers\CartHandler;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Session;

class CouponController extends Controller
{
    protected $cartHandler;

    public function __construct(CartHandler $cartHandler)
    {
        $this->cartHandler = $cartHandler;
    }

    function applyCoupon(Request $request)
    {
        session()->forget('coupon');
        $cart = session()->get('cart', []);
        $code = $request->input('coupon');
        $coupon = Coupon::where('code', $code)->first();

        if ($coupon) {
            if ($coupon->discount_type == 1) {
                $discount = $coupon->discount;
            } elseif ($coupon->discount_type == 2) {
                $discount = ($coupon->discount) / 100;
            }

            Session::put('coupon', [
                'code' => $coupon->code,
                'discount_type' => $coupon->discount_type,
                'discount' => $discount,
            ]);

            $totalPrice = $this->cartHandler->cartTotal($cart);

            return redirect()->back()->with('success', 'Coupon activated successfully!');
        } else {
            return redirect()->back()->with('error', 'Coupon code is invalid!');
        }
    }
}
