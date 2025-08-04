<?php

namespace App\Services;

use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function addToCart($uuid, $quantity)
    {
        try {

            DB::beginTransaction();

            $product = Product::where('uuid', $uuid)->firstOrFaiil();

            if ($product->stock < $quantity) {
                DB::rollBack();
                return [
                    'status' => 0,
                    'message' => "Product {$product->id} has insufficient stock."
                ];
            }

            Cart::add([
                $product->uuid,
                $product->name,
                $product->price,
                $quantity
            ]);

            DB::commit();

            return [
                'status' => 1,
                'message' => $product->name . ' added to the cart.'
            ];
        } catch (Exception $ex) {
            DB::rollBack();

            return [
                'status' => 0,
                'message' => 'Whoops, Something Went Wrong!'
            ];
        }
    }
}
