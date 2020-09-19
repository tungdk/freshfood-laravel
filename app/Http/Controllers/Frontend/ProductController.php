<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends FontendController
{
    //
    public function index(Request $request)
    {
        $productsSale=Product::where('status',1)
        ->orderByDesc('id')
        ->limit(6)
        ->select('id','name','slug','picture','price','sale','qty')
        ->where('sale','!=',0)
        ->get();
        $publishers=Publisher::all();

        $subcategoriesInvolve=[];
        if ($request->category) {
            $subcategoriesInvolve=SubCategory::where('status',1)->where('category_id',$request->category)->get();
        }

        $productsSearch=Product::where('products.status',1);

        if ($request->name) {
            $productsSearch->where('name','like','%'.$request->name.'%');
        }

        if ($request->publisher) {
            $productsSearch->where('publisher_id',$request->publisher);
        }
        if ($request->category) {
            $productsSearch->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
                            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
                            ->where('categories.id',$request->category);
        }
        if ($request->subcategory) {
            $productsSearch->where('subcategory_id',$request->subcategory);
        }
        $productsSearch= $productsSearch->orderByDesc('id')
        ->select('products.id','products.name','products.slug','products.picture','products.price','products.sale')
        ->paginate(12);

        $viewData=[
            'productsSale'=>$productsSale,
            'productsSearch'=>$productsSearch,

            'subcategoriesInvolve'=>$subcategoriesInvolve,
            'publishers'=>$publishers,
            'query' =>$request->query(),
        ];

        return view('fontend.pages.product.index',$viewData);
    }
}
