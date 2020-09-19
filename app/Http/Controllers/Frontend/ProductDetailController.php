<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class ProductDetailController extends FontendController
{
    //
    public function getProductDetail(Request $request,$slug)
    {
        $arraySlug=explode('-',$slug);
        $id=array_pop($arraySlug);

        $ratings=Rating::with('user:id,name')
            ->where('product_id',$id)
            ->orderByDesc('id')
            ->paginate(5);
        $ratingData=Rating::groupBy('number')
            ->where('product_id',$id)
            ->select(DB::raw('count(number) as count'),DB::raw('sum(number) as total'))
            ->addSelect('number')
            ->get()->toArray();
            // dd($ratingData);
        $ratingDefault=$this->mapRating();
        foreach ($ratingData as $key => $item) {
            $ratingDefault[$item['number']]=$item;
        }

        if($id){
            $product=Product::with([
                'unit:id,name',
                'publisher:id,name'
            ])->find($id);
            $viewData=[
                'product'=>$product,
                'ratings'=>$ratings,
                'ratingDefault'=>$ratingDefault,
                'productSuggests'=>$this->getProductSuggests($product->subcategory_id)
            ];
            return view('fontend.pages.product_detail.index',$viewData);
        }
        return redirect()->to('/');
    }
    private function getProductSuggests($subcategoriID)
    {
        $products=Product::where([
            'status'=>1,
            'subcategory_id'=>$subcategoriID
        ])
        ->orderByDesc('id')
        ->select('id','name','slug','picture','price','sale','qty')
        ->limit(4)
        ->get();
        return $products;
    }
    private function mapRating()
    {
        $ratingDefault=[];
        for ($i=1; $i <=5; $i++) {
            $ratingDefault[$i]=[
                "count"=>0,
                "total"=>0,
                "number"=>0
            ];
        }
        return $ratingDefault;
    }
}
