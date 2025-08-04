<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        // \Cart::clear();
        // \Cart::clearItems();
        $carts = \Cart::getContent()->groupBy(function ($item) {
            return $item->attributes->vendor_id;
        });

        if (count($carts) < 1) {
            return redirect()->route('front.products');
        }

        return view('frontend.carts', compact('carts'));
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

    public function remove(Request $request)
    {

        $cart = \Cart::remove($request->id);
        if ($cart) {
            return response()->json(['res_code' => 1, 'method' => 'redirect_with_msg', 'title' => 'Success', 'type' => 'success', 'link' => route('carts.index'), 'message' => 'Product removed from cart!']);
        }
    }

    public function update(Request $request)
    {

        $cart = \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        if ($cart) {
            return response()->json(['res_code' => 1, 'method' => 'redirect_with_msg', 'title' => 'Success', 'type' => 'success', 'link' => route('carts.index'), 'message' => 'Cart updated!']);
        }
    }
}
