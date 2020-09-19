<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\SubCategory;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $products=Product::with([
            'unit:id,name',
            'subcategory:id,name'
        ]);
        if($id=$request->id) $products->where('id',$id);
        if($name=$request->name) $products->where('name','like','%'.$name.'%');
        if($subcategory_id=$request->subcategory_id) $products->where('subcategory_id',$subcategory_id);
        if($publisher_id=$request->publisher_id) $products->where('publisher_id',$publisher_id);

        $products=$products->orderByDesc('id')->paginate(10);
        $subcategories=SubCategory::all();
        $publishers=Publisher::all();


        $viewData=[
            'products'=>$products,
            'subcategories'=>$subcategories,
            'publishers'=>$publishers,
            'query'  =>$request->query(),
        ];
        return view('admin.product.index',$viewData);
    }
    public function create()
    {
        $subcategories=SubCategory::all();
        $publishers=Publisher::all();
        $units=Unit::all();
        return view('admin.product.create',compact('subcategories','publishers','units'));
    }
//    public function store(AdminRequestProduct $request)
    public function store(AdminRequestProduct $request)
    {

        $data=$request->except('_token','picture');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('picture')) {
            //get file from input
            $image = $request->file('picture');
            //get file name - ham time() trong php de get ra time vi du 9822828
            $name = time().'-'.$image->getClientOriginalName();
            //path - duong dan store
            $destinationPath = public_path('/uploads/brand');
            //chuyen file tạm thành file chính
            $image->move($destinationPath, $name);
            $data['picture'] = $name;
        }
//        if ($request->picture) {
//            $image = upload_image('picture');
//            if ($image['code'] == 1)
//                $data['picture'] = $image['name'];
//        }
        $id=Product::insertGetId($data);
        return redirect()->back();
    }
    public function edit($id)
    {
        $product=Product::findOrFail($id);
        $subcategories=SubCategory::all();
        $publishers=Publisher::all();
        $units=Unit::all();
        return view('admin.product.update',compact('product','subcategories','publishers','units'));
    }

    public function update(AdminRequestProduct $request , $id)
    {
        $product = Product::findOrFail($id);
        $data               =$request->except('_token','picture');
        $data['slug']       = Str::slug($request->name);
        $data['updated_at'] = Carbon::now();
        if ($request->hasFile('picture')) {
            //get file from input
            $image = $request->file('picture');
            //get file name - ham time() trong php de get ra time vi du 9822828
            $name = time().'-'.$image->getClientOriginalName();
            //path - duong dan store
            $destinationPath = public_path('/uploads/brand');
            //chuyen file tạm thành file chính
            $image->move($destinationPath, $name);
            $data['picture'] = $name;
        }

        $product->update($data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $product=Product::find($id);
        if($product) $product->delete();
        return redirect()->back();
    }

    public function active($id)
    {
        $product=Product::find($id);
        $product->status=!$product->status;
        $product->save();
        return redirect()->back();
    }

    public function hot($id)
    {
        $product=Product::find($id);
        $product->hot=!$product->hot;
        $product->save();
        return redirect()->back();
    }
}
