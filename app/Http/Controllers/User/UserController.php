<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestUpdateInfo;
use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\User;
use App\Models\Ward;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    //
    public function updateInfo()
    {
        $city = City::orderby('matp','ASC')->get();
        return view('user.info',compact('city'));
    }

    public function saveUpdateInfo(UserRequestUpdateInfo $request){

        $user = User::find(Auth::id());
        $data               =$request->except('_token');
        if (User::where('email', $request->email)->count()>0) {
            $check = User::where('email', $request->email)->first();

            if ( $check->id != (int)$request->id) {
                Session::flash('toastr',[
                    'type'  =>  'error',
                    'message' => 'Email đã được sử dụng'
                ]);
                return redirect()->back();
            }
        }

        $data['updated_at'] = Carbon::now();
        $data['password'] = bcrypt($request->password);
        $user->update($data);

        Session::flash('toastr',[
            'type'  =>  'success',
            'message' => 'Cập nhật thông tin thành công'
        ]);
        return redirect()->back();
    }


    public function orderInfo(Request $request)
    {
        $orders=Order::whereRaw(1)
            ->where('user_id',Auth::id());
        if ($request->id) {
           $orders->where('id',$request->id);
        }

        if ($request->email) {
            $orders->where('email','like','%'.$request->email.'%');
         }

         if ($request->status) {
                $status=$request->status;
                $orders->where('status',$status);
         }

        $orders=$orders->orderByDesc('id')
                       ->paginate(10);
        $viewData=[
            'orders'=>$orders,
            'query' =>$request->query()
        ];
        return view('user.order',$viewData);
    }
}
