<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserRatingController extends Controller
{
    //
    public function addRatingProduct(Request $request){
        if($request->ajax()){
            $data=$request->except('_token');
            $rating=new Rating();
            $rating->user_id=Auth::id();
            $rating->product_id=$request->product_id;
            $rating->number=$request->review;
            $rating->content=$request->content;
            $rating->created_at=Carbon::now();

            $rating->save();
            if ($rating->id) {
                
                $html=view('fontend.components.rating_item',compact('rating'))->render();
                $this->staticRatingProduct($request->product_id,$request->review);
            }
            return response([
                'html'    =>$html ?? null,
                'messages'=>'Đánh giá sản phẩm thành công'
            ]);
        }
    }
    public function staticRatingProduct($productID,$number)
    {
        $product=Product::find($productID);
        $product->review_total++;
        $product->review_star += $number;
        $product->save();
    }
}
