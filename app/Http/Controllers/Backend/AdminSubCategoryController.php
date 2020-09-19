<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestSubCategory;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSubCategoryController extends Controller
{
    //
    public function index()
    {
        $subcategories=SubCategory::with('category:id,name,slug')->paginate(15);
        $viewData=[
            'subcategories'=>$subcategories,
        ];
        return view('admin.subcategory.index',$viewData);
    }
    public function create()
    {
        return view('admin.subcategory.create');
    }
    public function store(AdminRequestSubCategory $request)
    {
        $data=$request->except('_token');
        $data['slug'] = Str::slug($request->name);
        $data['created_at'] = Carbon::now();

        $id=SubCategory::insertGetId($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $subcategory=SubCategory::find($id);
        $categories=Category::all();
        return view('admin.subcategory.update',compact('subcategory','categories'));
    }

    public function update(AdminRequestSubCategory $request , $id)
    {
        $subcategory = SubCategory::find($id);
        $data               =$request->except('_token');
        $data['slug']       = Str::slug($request->name);
        $data['updated_at'] = Carbon::now();

        $subcategory->update($data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $subcategory=SubCategory::find($id);
        if($subcategory) $subcategory->delete();
        return redirect()->back();
    }

    public function active($id)
    {
        $subcategory=SubCategory::find($id);
        $subcategory->status=!$subcategory->status;
        $subcategory->save();
        return redirect()->back();
    }
}
