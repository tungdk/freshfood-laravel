<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCheckOut;
use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Ward;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        if(sizeof(Cart::content()) > 0){
            $shopping=Cart::content();
            $city = City::orderby('matp','ASC')->get();
            $viewData=[
                'shopping'=>$shopping,
                'city'=>$city,

            ];
            return view('fontend.pages.checkout.index',$viewData);
        }else{
            Session::flash('toastr',[
                'type'  =>  'error',
                'message' => 'Chưa có sản phẩm nào trong giỏ hàng, mời bạn tiếp tục mua hàng'
            ]);
            return redirect()->to('/');
        }

    }

    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                if($data['ma_id']<10){
                    $tg="0".$data['ma_id'];
                }else{
                    $tg=$data['ma_id'];
                }
                $select_district= District::where('matp',$tg)->orderby('maqh','ASC')->get();
                    $output.='<option>---Chọn quận huyện---</option>';
                    foreach($select_district as $key => $district){
                        $output.='<option value="'.$district->maqh.'">'.$district->name.'</option>';
                    }

            }else{
                if($data['ma_id']<10){
                    $tg="00".$data['ma_id'];
                }else if($data['ma_id']>9 && $data['ma_id']<99){
                    $tg="0".$data['ma_id'];
                }
                else{
                    $tg=$data['ma_id'];
                }
                $select_ward = Ward::where('maqh',$tg)->orderby('xaid','ASC')->get();
                $output.='<option>---Chọn xã phường---</option>'.$data['ma_id'];
                foreach($select_ward as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name.'</option>';
                }
            }
            echo $output;
        }
    }
    public function postPay(RequestCheckOut $request){


        $data=$request->except(['_token','city','district','ward']);
        if($city= $request->city ){
            $nameCity=City::find($city)->name;
        }
        if($district= $request->district ){
            $nameDistrict=District::find($district)->name;
        }

        if($ward= $request->ward ){
            $nameWard=Ward::find($ward);
        }
        if(isset(Auth::user()->id)){
            $data['user_id']=Auth::user()->id;
        }
        $data['address']= $request->address.', '.$nameCity.','.$nameDistrict ;
        $data['total']=str_replace(',', '',Cart::subtotal(0));
        $data['created_at'] = Carbon::now();
        $orderID=Order::insertGetId($data);
        if($orderID){
            $shopping=Cart::content();
            foreach ($shopping as $key => $value) {

               OrderDetail::insert([
                   'order_id'       =>$orderID,
                   'product_id'     => $value->id,
                   'qty'            =>$value->qty,
                   'sale'           =>$value->options->sale,
                   'price'          =>$value->price
               ]);

               DB::table('products')->where('id',$value->id)->increment('pay');
               $product= Product::find($value->id);
               $qty=$product->qty - ($value->qty *$product->number);
               $product['qty']=$qty;
               $product->save();
            }
        }
        Session::flash('toastr',[
            'type'  =>  'success',
            'message' => 'Đơn hàng của bạn đã được lưu'
        ]);

        Cart::destroy();
        return redirect()->to('/');

    }
}
