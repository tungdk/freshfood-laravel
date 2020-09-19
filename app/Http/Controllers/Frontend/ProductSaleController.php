<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductSaleController extends Controller
{
    //
    public function index(){
        $productsSale=Product::where('status',1)
        ->where('sale','>',0)
        ->orderByDesc('id')
        ->select('id','name','slug','picture','price','sale','qty')
        ->paginate(8);

        $viewData=[
            'productsSale'=>$productsSale,
        ];
        return view('fontend.pages.product_sale.index',$viewData);
    }

}
