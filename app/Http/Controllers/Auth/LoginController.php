<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        $take_me = null;

        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $take_me = redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($credentials)) {
            $take_me = redirect(route('home'));
        } else {
            $take_me = redirect(route('home'))->withError('Login attempt failed.');
        }

        return $take_me;
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect(route('home'));
    }
}
