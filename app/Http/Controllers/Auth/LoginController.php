<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Mail\SignUpOtp;
use App\Models\SMS;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required',
                'password' => 'required|string',
            ],
            [
                'email.required' => 'Email field is required.',
                'password.required' => 'Password field is required.',
            ]
        );

        if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password], $request->remeber)) {
            return redirect()->intended(url()->previous());
        }

        return redirect(route('login'))->withInput($request->only('email', 'remember'))->withErrors(['email' => Lang::get('auth.failed')]);
    }

    public function logout()
    {
        Auth::guard()->logout();
        return redirect()->intended(route('login'));
    }
}
