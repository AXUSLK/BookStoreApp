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
        $recentProducts = Product::active()->orderBy('created_at', 'desc')->take(12)->get();
        return view('home', compact('categories', 'recentProducts'));
    }
}
