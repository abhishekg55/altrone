<?php

namespace App\Services;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;

class CartService
{
    public function addToCart($uuid, $quantity)
    {
        try {

            $product = Product::with('vendor')->where('uuid', $uuid)->firstOrFail();

            if ($product->stock < $quantity) {
                return [
                    'status' => 0,
                    'message' => "Product {$product->name} has insufficient stock."
                ];
            }

            $items =  [
                'id' => $product->uuid,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'attributes' => [
                    'vendor_id' => $product->vendor_id,
                    'vendor_name' => $product->vendor->name,
                    'image' => $product->image
                ]
            ];

            \Cart::add($items);

            $cart = session()->get('guest_cart', []);
            $cart[] = $items;
            session()->put('guest_cart', $cart);

            return [
                'status' => 1,
                'message' => $product->name . ' added to the cart.'
            ];
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return [
                'status' => 0,
                'message' => 'Whoops, Something Went Wrong!'
            ];
        }
    }
}
