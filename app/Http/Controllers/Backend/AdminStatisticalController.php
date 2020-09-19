<?php

namespace App\Http\Controllers\Backend;

use App\HelpersClass\Date;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStatisticalController extends Controller
{
    //
    public function index()
    {
        // tổng đơn hàng
        $totalOrders=DB::table('orders')->select('id')->count();
        // tổng thành viên
        $totalUsers=DB::table('users')->select('id')->count();
         // tổng sản phẩm
         $totalProducts=DB::table('products')->select('id')->count();
        // tổng đánh giá
        $totalRatings=DB::table('ratings')->select('id')->count();
         // danh sách đơn hàng mới
         $orders=Order::orderByDesc('id')
         ->limit(10)
         ->get();
        // top sản phẩm mua nhiều
          $topPayProducts=Product::orderByDesc('pay')
          ->limit(5)
          ->get();
        // thống kê trạng thái đơn hàng
        //tiếp nhận
        $orderDefault=Order::where('status',1)->select('id')->count();
        //đang vận chuyển
        $orderProcess=Order::where('status',2)->select('id')->count();
        // thành công
        $orderSuccess=Order::where('status',3)->select('id')->count();
        // hủy
        $orderCancel=Order::where('status',-1)->select('id')->count();
        $statusOrder=[
            [
                'Hoàn tất',$orderSuccess,false
            ],
            [
                'Đang vận chuyển',$orderProcess,false
            ],
            [
                'Tiếp nhận',$orderDefault,false
            ],
            [
                'Hủy Bỏ',$orderCancel,false
            ],
        ];
        // danh sách lấy ngày theo tháng
        $listDay=Date::getListDayInMonth();

        // danh thu theo tháng
        $revenueOrderMonth=Order::where('status',3)
            ->whereMonth('created_at',date('m'))
            ->select(DB::raw('sum(total) as totalMoney'),DB::raw('Date(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();
        $arrRevenueOrderMonth=[];
        foreach ($listDay as $day) {
            $total=0;
            foreach ($revenueOrderMonth as $key => $revenue) {
                if ($revenue['day']==$day) {
                    $total=$revenue['totalMoney'];
                    break;
                }
            }
            $arrRevenueOrderMonth[]=(int)$total;
        }

        $viewData=[
            'totalOrders'           =>$totalOrders,
            'totalUsers'            =>$totalUsers,
            'totalProducts'         =>$totalProducts,
            'totalRatings'         =>$totalRatings,
            'orders'                =>$orders,
            'topPayProducts'        =>$topPayProducts,
            'statusOrder'           =>json_encode($statusOrder),
            'listDay'               =>json_encode($listDay),
            'arrRevenueOrderMonth'  =>json_encode($arrRevenueOrderMonth),

        ];

        return view('admin.statistical.index',$viewData);
    }
}
