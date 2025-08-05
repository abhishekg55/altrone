<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        try {

            DB::beginTransaction();

            $product = Product::where('status', true)->where('uuid',  $request->id)->lockForUpdate()->first();

            if ($product->stock < $request->quantity) {
                DB::rollBack();
                return response()->json(['res_code' => 1, 'message' => $product->name . ' is out of stock, only ' . $product->stock . ' in the stock.', 'method' => "error_message", 'title' => 'Error', 'type' => 'error']);
            }

            $cart = \Cart::update(
                $request->id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity
                    ],
                ]
            );

            DB::commit();

            if ($cart) {
                return response()->json(['res_code' => 1, 'method' => 'redirect_with_msg', 'title' => 'Success', 'type' => 'success', 'link' => route('carts.index'), 'message' => 'Cart updated!']);
            }
        } catch (Exception $ex) {
            DB::rollBack();

            return response()->json(['res_code' => 1, 'message' => ' Whoops, Something went wrong', 'method' => "error_message", 'title' => 'Error', 'type' => 'error']);
        }
    }
}
