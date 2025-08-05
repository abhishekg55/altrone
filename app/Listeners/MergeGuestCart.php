<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Joelwmale\Cart\Facades\Cart;

class MergeGuestCart
{
    public function handle(Login $event)
    {
        $user = $event->user;

        // Get the current (guest) cart
        $guestCart = session()->get('guest_cart', []);

        // Add guest cart items to user's cart
        foreach ($guestCart as $item) {
            \Cart::add([
                'id'      => $item['id'],
                'name'    => $item['name'],
                'price'   => $item['price'],
                'quantity'=> $item['quantity'],
                'attributes' => $item['attributes'],
            ]);
        }

        // Optional: clear the guest cart
         session()->forget('guest_cart');
    }
}
