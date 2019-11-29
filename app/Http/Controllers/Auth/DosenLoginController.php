<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    }
}


namespace App\Http\Controllers\Auth;

use App\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class DosenLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $guard = 'dosen';
    protected $redirectTo = '/dosen';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.dosenLogin');
    }
    public function guard()
    {
        return auth()->guard('dosen');
    }
    public function showRegisterPage()
    {
        return view('auth.dosenregister');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:199',
            'email' => 'required|string|email|max:255|unique:dosens',
            'password' => 'required|string|min:6|confirmed'
        ]);
        Dosen::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('dosen-login')->with('success','Registration Success');
    }
    public function login(Request $request)
    {
        if (auth()->guard('dosen')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            return redirect()->route('dosenpage');
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}