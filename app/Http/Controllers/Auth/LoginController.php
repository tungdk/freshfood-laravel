<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLogin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::ADMIN;



    public function postLogin(RequestLogin $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Session::flash('toastr',[
                'type'  =>  'success',
                'message' => 'Đăng nhập thành công'
            ]);
            return redirect()->intended('/');
        }else{
            Session::flash('toastr',[
                'type'  =>  'error',
                'message' => 'Tài khoản mật khẩu không chính xác'
            ]);
            return redirect()->back();
        }

    }

//    public function getLogout ()
//    {
//        Auth::logout();
//        return redirect()->to('/home');
//    }
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
