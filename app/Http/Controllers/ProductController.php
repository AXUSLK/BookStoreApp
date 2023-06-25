<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::active()->paginate(12);
        return view('shop.index', compact('products'));
    }

    function category($category)
    {
        $category = Category::where('slug', $category)->first();
        $categoryId = $category->id;
        $products = Product::active()
            ->whereHas('category', function ($query) use ($categoryId) {
                $query->where('id',  $categoryId);
            })
            ->paginate(12);
        return view('shop.category', compact('products', 'category'));
    }
}
