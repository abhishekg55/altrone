<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->is_admin) {
            return view('backend.index');
        }
    }

    function frontHomePage()
    {
        $products = Product::where('status', true)->orderBy('id', 'desc')->limit(10)->get();
        $testimonials = [];

        return view('frontend.index', compact('products', 'testimonials'));
    }
}
