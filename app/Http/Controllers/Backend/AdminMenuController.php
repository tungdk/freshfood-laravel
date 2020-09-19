<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestMenu;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Str;
class AdminMenuController extends AdminController
{
    //
    public function index()
    {
        $menus=Menu::all();
        $viewData=[
            'menus'=>$menus,
        ];
        return view('admin.menu.index',$viewData);
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(AdminRequestMenu $request)
    {
        $data=$request->except('_token');
        $data['slug'] = Str::slug($request->name);
        $data['created_at'] = Carbon::now();
        $id=Menu::insertGetId($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $menu=Menu::find($id);
        return view('admin.menu.update',compact('menu'));
    }

    public function update(AdminRequestMenu $request , $id)
    {
        $menu = Menu::find($id);
        $data               =$request->except('_token');
        $data['slug']       = Str::slug($request->name);
        $data['updated_at'] = Carbon::now();

        $menu->update($data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $menu=Menu::find($id);
        if($menu) $menu->delete();
        return redirect()->back();
    }

    public function active($id)
    {
        $menu=Menu::find($id);
        $menu->status=!$menu->status;
        $menu->save();
        return redirect()->back();
    }

    public function hot($id)
    {
        $menu=Menu::find($id);
        $menu->hot=!$menu->hot;
        $menu->save();
        return redirect()->back();
    }
}
