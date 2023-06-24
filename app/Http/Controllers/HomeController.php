<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()->get();
        $recentProducts = Product::active()->get()->take(12);
        return view('home', compact('categories', 'recentProducts'));
    }
}
