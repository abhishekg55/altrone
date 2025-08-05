<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required|string',
            ],
            [
                'email.required' => 'Email field is required.',
                'password.required' => 'Password field is required.',
            ]
        );

        if ($validation->fails()) {
            return response()->json(['res_code' => 1, 'message' => $validation->errors()->first(), 'method' => "error_message", 'title' => 'Error', 'type' => 'error']);
        }

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['res_code' => 1, 'method' => 'redirect', 'link' => url()->previous()]);
        }

        return response()->json(['res_code' => 1, 'message' => Lang::get('auth.failed'), 'method' => "error_message", 'title' => 'Error', 'type' => 'error']);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        \Cart::clear();
        \Cart::clearItems();
        return redirect()->intended(route('front.home'));
    }
}
