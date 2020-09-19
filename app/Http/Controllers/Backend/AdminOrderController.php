<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    //
    public function index(Request $request)
    {

        $orders=Order::whereRaw(1);
        if ($request->id) {
           $orders->where('id',$request->id);
        }

        if ($request->email) {
            $orders->where('email','like','%'.$request->email.'%');
         }

        if ($request->type) {
            $type=$request->type;
            if($type==1)
                $orders->where('user_id','<>',0);
            else
                $orders->where('user_id',0);
         }

         if ($request->status) {
                $status=$request->status;
                $orders->where('status',$status);
         }

        $orders=$orders->orderByDesc('id')
                       ->paginate(10);
        $viewData=[
            'orders'=>$orders,
            'query' =>$request->query()
        ];
        return view('admin.order.index',$viewData);
    }

    public function getOrderDetail(Request $request,$id)
    {
        if($request->ajax())
        {
            $orderDetail=OrderDetail::with('product:id,name,picture')->where('order_id',$id)->get();
            $html = view("admin.components.orderdetail",compact('orderDetail'))->render();
            return response([
                'html'=> $html
            ]);
        }
    }

    public function getAction($action,$id){
        $order=Order::find($id);
        if ($order) {
            switch ($action) {
                case 'process':
                    # code...
                    $order->status=2;
                    break;
                case 'success':
                    # code...
                    $order->status=3;
                    break;
                default:
                    $order->status=-1;
                    $orderDetails=OrderDetail::where('order_id',$id)->get();
                    foreach ($orderDetails as $value) {
                       $product=Product::find($value->product_id);
                      
                       $qty=$product->qty+$product->number*$value->qty;

                       $product['qty']=$qty;
                       $product->save();
                    }
                    # code...
                    break;
            }
            $order->save();
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        $order=Order::find($id);
        if($order) {
            DB::table('orderdetails')->where('order_id',$id)->delete();
            $order->delete();

        }
        return redirect()->back();
    }

    public function deleteOrderDetail(Request $request,$id)
    {
        if($request->ajax())
        {
            $orderDetail=OrderDetail::find($id);
            if($orderDetail) {
               $money=$orderDetail->qty*$orderDetail->price;
               DB::table('orders')->where('id',$orderDetail->order_id)->decrement('total',$money);
               $orderDetail->delete();
            }
        }
        return response(['code'=>200]);
    }
}
