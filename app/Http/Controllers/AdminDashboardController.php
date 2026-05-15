<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SocialLink;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $socials = SocialLink::count();
        return view('admin.dashboard', compact('products', 'socials'));
    }
}
