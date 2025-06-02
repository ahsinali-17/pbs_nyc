<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Where to redirect users after login.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @var string
     */

    public function redirectTo()
    {
        if (Auth::user()) {
            return RouteServiceProvider::HOME;
        } else {
            return '/';
        }
    }

    protected function credentials(Request $request)
    {
        $array = $request->only($this->username(), 'password');
        if (isset($array[$this->username()])) {
            $array[$this->username()] = Str::lower($array[$this->username()]);
        }
        return $array;
    }
}
