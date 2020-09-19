<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    //
    public function index()
    {
        $shopping=Cart::content();
        return view('fontend.pages.shopping.index',compact('shopping'));
    }

    public function add($id)
    {

        $product=Product::find($id);
        if(!$product) return redirect()->to('/');


        if($product->qty<1){
            Session::flash('toastr',[
                'type'  =>  'error',
                'message' => 'Số lượng sản phẩm không đủ'
            ]);
            return redirect()->back();
        }

        Cart::add([
            'id'        =>$product->id,
            'name'      =>$product->name,
            'qty'       =>1,
            'price'     =>number_price($product->price,$product->sale),
            'weight'    =>0,
            'options' =>[
                'sale'  =>$product->sale,
                'image' =>$product->picture,
                'price_old' =>$product->price,
            ]
        ]);
        Session::flash('toastr',[
            'type'  =>  'success',
            'message' => 'Thêm giỏ hàng thành công'
        ]);
        return redirect()->back();
    }

    public function addnow($id)
    {

        $product=Product::find($id);
        if(!$product) return redirect()->to('/');

        if($product->qty<1){
            Session::flash('toastr',[
                'type'  =>  'error',
                'message' => 'Số lượng sản phẩm không đủ'
            ]);
            return redirect()->back();
        }

        Cart::add([
            'id'        =>$product->id,
            'name'      =>$product->name,
            'qty'       =>1,
            'price'     =>number_price($product->price,$product->sale),
            'weight'    =>0,
            'options' =>[
                'sale'  =>$product->sale,
                'image' =>$product->picture,
                'price_old' =>$product->price,
            ]
        ]);
        Session::flash('toastr',[
            'type'  =>  'success',
            'message' => 'Thêm giỏ hàng thành công'
        ]);
        return redirect()->to('gio-hang');
    }

    public function portCart(Request $request){
        $product=Product::find($request->productid_hidden);
        if(!$product) return redirect()->to('/');

        $quantity = $request->qty;

        if($product->qty<$request->qty){
            Session::flash('toastr',[
                'type'  =>  'error',
                'message' => 'Số lượng sản phẩm không đủ'
            ]);
            return redirect()->back();
        }

        Cart::add([
            'id'        =>$product->id,
            'name'      =>$product->name,
            'qty'       =>$quantity,
            'price'     =>number_price($product->price,$product->sale),
            'weight'    =>0,
            'options' =>[
                'sale'  =>$product->sale,
                'image' =>$product->picture,
                'price_old' =>$product->price,
            ]
        ]);
        Session::flash('toastr',[
            'type'  =>  'success',
            'message' => 'Thêm giỏ hàng thành công'
        ]);
        return redirect()->back();
    }
    public function update(Request $request,$rowId){
        if ($request->ajax()) {
            # code...
            $qty=$request->qty ?? 1;
            $idProduct=$request->idProduct;
            $product=Product::find($idProduct);

            if (!$product) {
                return response(['messages'=>'Không tồn tại sản phẩm cần cập nhật']);
            }
            if($product->qty<$qty){
                return response(['messages'=>'Số lượng không đủ để câp nhật']);
            }

            Cart::update($rowId,$qty);
            return response(['messages'=>'Cập nhật thành công']);
        }
    }
    public function delete($rowId)
    {

        Cart::remove($rowId);
        Session::flash('toastr',[
            'type'  =>  'success',
            'message' => 'Xóa sản phẩm giỏ hàng thành công'
        ]);
        return redirect()->back();
    }
}
