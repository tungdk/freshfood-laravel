<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AdminRequestCategory;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends AdminController
{
    //
    public function index()
    {
        $categories=Category::paginate(15);
        $viewData=[
            'categories'=>$categories,
        ];
        return view('admin.category.index',$viewData);
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(AdminRequestCategory $request)
    {
        $data=$request->except('_token');
        $data['slug'] = Str::slug($request->name);
        $data['created_at'] = Carbon::now();

        $id=Category::insertGetId($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.category.update',compact('category'));
    }

    public function update(AdminRequestCategory $request , $id)
    {
        $category = Category::find($id);
        $data               =$request->except('_token');
        $data['slug']       = Str::slug($request->name);
        $data['updated_at'] = Carbon::now();
      
        $category->update($data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $category=Category::find($id);
        if($category) $category->delete();
        return redirect()->back();
    }

    public function active($id)
    {
        $category=Category::find($id);
        $category->status=!$category->status;
        $category->save();
        return redirect()->back();
    }

    public function hot($id)
    {
        $category=Category::find($id);
        $category->hot=!$category->hot;
        $category->save();
        return redirect()->back();
    }
}
