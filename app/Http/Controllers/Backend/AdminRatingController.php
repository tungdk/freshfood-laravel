<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class AdminRatingController extends Controller
{
    //
    public function index()
    {
        $ratings=Rating::with([
            'product:id,name',
            'user:id,name',
        ])->paginate(15);
        $viewData=[
            'ratings'=>$ratings,
        ];
        return view('admin.rating.index',$viewData);
    }
    public function delete($id)
    {
        $rating=Rating::find($id);
        if($rating)
        {
            $product=Product::find($rating->product_id);
            $product->review_total--;
            $product->review_star -= $rating->number;
            $product->save();
            $rating->delete();
        }

        return redirect()->back();
    }
}
