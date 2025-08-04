<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if (auth()->user()->is_admin || auth()->user()->hasRole('vendor')) {
            return view('backend.index');
        } else {
            return redirect()->back();
        }
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

    public function register(UserRegisterRequest $request)
    {
        $validation = Helper::getValidationMessage($request);

        if ($validation) {
            return response()->json(['res_code' => 1, 'message' => $validation, 'method' => "error_message", 'title' => 'Error', 'type' => 'error']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'is_admin' => 0,
        ]);

        $user->assignRole('customer');

        Auth::guard('customer')->login($user);

        return response()->json(['res_code' => 1, 'method' => 'redirect_with_msg', 'title' => 'Success', 'type' => 'success', 'link' => url()->previous(), 'message' => 'Registered Successfully !']);
    }
}
