<?php

namespace App\Handlers;

class CartHandler
{
    public function cartTotal(&$cart)
    {
        $coupon = session()->get('coupon', []);
        if (empty($coupon)) {
            $totalPrice = $this->applyDiscounts($cart);
        } else {
            $totalPrice = $this->applyCoupon($cart);
        }
        return $totalPrice;
    }

    public function applyDiscounts(&$cart)
    {
        $childrenBooksCount = 0;
        $totalBooksCount = 0;
        $categoriesCount = [];
        session()->forget('discount');

        foreach ($cart as $item) {
            $totalBooksCount += 1;

            if ($item['category'] === 'Children') {
                $childrenBooksCount += 1;
            }

            if (!isset($categoriesCount[$item['category']])) {
                $categoriesCount[$item['category']] = 1;
            } else {
                $categoriesCount[$item['category']] += 1;
            }
        }

        if ($childrenBooksCount >= 5) {
            $this->applyChildrenBooksDiscount($cart);
        }
        if ($totalBooksCount >= 10) {
            $this->applyCategoryDiscount($cart, $categoriesCount);
        }

        $totalPrice = 0;
        foreach ($cart as &$item) {
            $totalPrice += $item['price'];
        }

        return $totalPrice;
    }

    public function applyChildrenBooksDiscount(&$cart)
    {
        foreach ($cart as &$item) {
            if ($item['category'] === 'Children') {
                $item['price'] = $item['price'] * 0.9;
            }
        }
        session()->put('discount', 'Children');
    }

    public function applyCategoryDiscount(&$cart, $categoriesCount)
    {
        foreach ($categoriesCount as $category => $count) {
            if ($count >= 10) {
                foreach ($cart as &$item) {
                    $item['price'] = $item['price'] * 0.95;
                }
                session()->put('discount', 'Other');
            }
        }
    }

    public function applyCoupon(&$cart)
    {
        $totalPrice = 0;
        $coupon = session()->get('coupon', []);

        foreach ($cart as &$item) {
            $totalPrice += $item['price'];
        }

        if ($coupon['discount_type'] == 1) {
            $totalPrice = $totalPrice - $coupon['discount'];
        } elseif ($coupon['discount_type'] == 2) {
            $discountAmount = $totalPrice * $coupon['discount'];
            $totalPrice = $totalPrice - $discountAmount;
        }

        session()->put('discount', 'Coupon');
        return $totalPrice;
    }
}
