<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        return view('frontend.carts');
    }

    public function store(Request $request)
    {
        $cartService = new CartService();

        $res = $cartService->addToCart($request->id, 1);

        if ($res['status']) {
            return response()->json(['res_code' => 1, 'method' => 'redirect_with_msg', 'title' => 'Success', 'type' => 'success', 'link' => route('carts.index'), 'message' => $res['message']]);
        } else {
            return response()->json(['res_code' => 1, 'message' => $res['message'], 'method' => "RegErrorMsg"]);
        }
    }
}
