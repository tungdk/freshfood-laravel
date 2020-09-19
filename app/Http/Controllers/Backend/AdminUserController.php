<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestUser;
use App\Http\Requests\RequestRegister;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class AdminUserController extends Controller
{
    //
    public function index()
    {
        $users=User::paginate(15);
        $viewData=[
            'users'=>$users,
        ];
        return view('admin.user.index',$viewData);
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(RequestRegister $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->pasword;
//        $data=$request->except('_token');
//        $data['slug'] = Str::slug($request->name);
//        $data['created_at'] = Carbon::now();
//        $data['password'] = bcrypt($request->pasword);
        $user->save();
//        User::insertGetId($data);

        Session::flash('toastr',[
            'type'  =>  'success',
            'message' => 'Thêm mới thông tin thành công'
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.user.update',compact('user'));
    }

    public function update(Request $request , $id)
    {
        $user = User::find($id);
        $data               =$request->except('_token');
        $data['updated_at'] = Carbon::now();
        $data['password'] = bcrypt($request->pasword);

        $user->update($data);
        Session::flash('toastr',[
            'type'  =>  'success',
            'message' => 'Cập nhật thông tin thành công'
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $user=User::find($id);
        if($user) $user->delete();
        return redirect()->back();
    }
}
