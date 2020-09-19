<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestNewPassword;
use App\Mail\ResetPassword;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    public function getEmailReset(){
        return view('auth.passwords.reset');
    }

    public function checkEmailReset(Request $request){
        $account=DB::table('users')->where('email',$request->email)->first();
        $token=Hash::make($account->email.$account->id);
        if($account){
            DB::table('password_resets')->insert([
                'email'=>$account->email,
                'token'=> $token ,
                'created_at'=>Carbon::now(),
            ]);

            $link = route('get.new_password',['email'=>$account->email,'_token'=> $token]);
            Mail::to($account->email)->send(new ResetPassword($link));
            return redirect()->to('/');
        }else{

        }
        return redirect()->back();
    }
    public function newPassword(Request $request){
        $token=$request->_token;
        $checkToken=DB::table('password_resets')
        ->where('token',$token)
        ->first();

        $now = Carbon::now();
        if($now->diffInMinutes($checkToken->created_at)>3){
            DB::table('password_resets')->where('email',$request->email)->delete();
            return redirect()->to('/');
        }
        if(!$checkToken) return redirect()->to('/');
        return view('auth.passwords.confirm');
    }

    public function savePassword(RequestNewPassword $request){
        $password=$request->password;
        $data['password']=Hash::make($password);
        $email=$request->email;
        if(!$email) return redirect()->to('/');
        DB::table('users')->where('email',$email)
        ->update($data);
        Session::flash('toastr',[
            'type'  =>  'success',
            'message' => 'Thay đổi mật khẩu thành công'
        ]);
        return redirect()->route('login');
    }
}
