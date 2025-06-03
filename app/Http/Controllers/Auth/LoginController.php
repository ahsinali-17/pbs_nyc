<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

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
     * @return string
     */
    public function redirectTo()
    {
        // Old redirection logic (commented)
        // return '/portal';

        // New redirection logic
        $user = Auth::user();
        if ($user && $user->level() >= 4) { // Assuming level 4 and above can access portal
            return 'http://localhost:3000/portal/dashboard';
        }
        return '/portal'; // This will trigger CheckPayment middleware which may redirect to /portal/subscribe
    }

    protected function authenticated(Request $request, $user)
    {
        try {
            // Generate JWT token
            $token = JWTAuth::fromUser($user);
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'token' => $token,
                    'user' => $user
                ]);
            }
            
            return redirect()->intended($this->redirectTo());
            
        } catch (JWTException $e) {
            // If JWT generation fails, still allow session login
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'user' => $user
                ]);
            }
            
            return redirect()->intended($this->redirectTo());
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

    protected function sendFailedLoginResponse(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => trans('auth.failed')
            ], 401);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => trans('auth.failed'),
            ]);
    }
}
