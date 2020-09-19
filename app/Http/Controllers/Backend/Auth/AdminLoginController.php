<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    //
    use AuthenticatesUsers;
    public function getLoginAdmin()
    {
        return view('admin.auth.login');
    }

    public function postLoginAdmin(Request $request)
    {
        if (Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::flash('toastr',[
                'type'  =>  'success',
                'message' => 'Đăng nhập thành công'
            ]);
            return redirect()->intended('/api-admin');
        }
        Session::flash('toastr',[
            'type'  =>  'error',
            'message' => 'Tài khoản mật khẩu không chính xác'
        ]);
        return redirect()->back();
    }
    public function getLogoutAdmin()
    {
        Auth::guard('admins')->logout();
        return redirect()->to('/');
    }
}
