<?php

namespace App\Http\Controllers\Frontend;


use App\Mail\OrderShipped;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class HomeController extends FontendController
{
    public function index()
    {

        $productsNew=Product::where('status',1)
        ->orderByDesc('id')
        ->limit(4)
        ->select('id','name','slug','picture','price','sale','qty')
        ->get();

        $productsHot=Product::where('hot',1)
        ->orderByDesc('id')
        ->limit(4)
        ->select('id','name','slug','picture','price','sale','qty')
        ->get();

        $products=Product::where('status',1)
        ->select('id','name','slug','picture','price','sale','qty')
        ->orderByDesc('id')
        ->paginate(8);

        $articlesNew=Article::where('status',1)
            ->orderByDesc('id')
            ->limit(3)
            ->select('id','name','slug','picture','description','created_at','content')
            ->get();

        $viewData=[
            'productsNew'=>$productsNew,
            'products'=>$products,
            'productsHot'=>$productsHot,
            'articlesNew'=>$articlesNew,
        ];

        return view('fontend.pages.home.index',$viewData);
    }
}
