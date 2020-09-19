<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserFavourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserFavouriteController extends Controller
{
    //
    public function index(){
        $userID=Auth::id();
        $products=Product::whereHas('favourite',function($query) use ($userID){
            $query->where('user_id',$userID);
        })
        ->select('id','name','slug','picture','price','sale')
        ->paginate(10);
        return view('user.favourite',compact('products'));
    }
    /**
     * Thêm sản phẩm yêu thích
     */
    public function addFavourite(Request $request,$id){
        if ($request->ajax()) {
            $product=Product::find($id);
            if(!$product)  return response(['messages'=>'Không tồn tại sản phầm']);
            $messages='Thêm yêu thích thành công';
            try {
                DB::table('user_favourites')->insert([
                    'product_id'=>$id,
                    'user_id'=>Auth::id()
                ]);
            } catch (\Throwable $th) {

                $messages='Sản phẩm này đã được yêu thích';
            }
            return response(['messages'=>$messages]);
        }
    }
    public function delete($idProduct)
    {
        $favourite=UserFavourite::where([
            'product_id'=>$idProduct,
            'user_id'=>Auth::id()
        ]);
        if($favourite) $favourite->delete();
        return redirect()->back();
    }
}
