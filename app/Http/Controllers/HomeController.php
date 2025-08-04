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
        // if (auth()->user()->is_admin) {
        return view('backend.index');
        // }
    }

    public function frontHomePage()
    {
        $products = Product::where('status', true)->orderBy('id', 'desc')->limit(10)->get();

        return view('frontend.index', compact('products'));
    }

    public function products()
    {
        $products = Product::where('status', true)->latest()->paginate(10);
        return view('frontend.products', compact('products'));
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }
}
