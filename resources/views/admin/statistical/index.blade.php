@extends('layouts.master_admin')
@section('content')
   <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Trang quản trị hệ thông
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Statistical</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số đơn hàng</span>
                        <span class="info-box-number">{{$totalOrders}}
                            <small><a href="{{route('admin.order.index')}}">(Chi tiết)</a></small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thành viên</span>
                        <span class="info-box-number">{{$totalUsers}}
                            <small><a href="{{route('admin.user.index')}}">(Chi tiết)</a></small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sản Phẩm</span>
                        <span class="info-box-number">{{$totalProducts}}
                            <small><a href="{{route('admin.product.index')}}">(Chi tiết)</a></small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đánh giá</span>
                        <span class="info-box-number">{{$totalRatings}}
                            <small><a href="{{route('admin.rating.index')}}">(Chi tiết)</a></small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div id="container2" data-listDay="{{$listDay}}" data-money="{{$arrRevenueOrderMonth}}"></div>

            </div>
             <div class="col-sm-4" style="margin-bottom: 15px" >
                <div id="container" data-json="{{$statusOrder}}"></div>

            </div>
        </div>
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- MAP & BOX PANE -->


                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách đơn hàng mới</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Info</th>
                                        <th>Money</th>
                                        <th>Account</th>
                                        <th>Status</th>
                                        <th>Time</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if($orders)
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>
                                                   <ul>
                                                       <li>Name: {{$order->name}}</li>
                                                       <li>Phone: {{$order->phone}}</li>
                                                       <li>Address: {{$order->address}}</li>
                                                       <li>Email: {{$order->email}}</li>
                                                   </ul>
                                                </td>
                                                <td>{{ number_format($order->total,0,',','.')}} vnđ</td>
                                                <td>
                                                    @if ($order->user_id)
                                                        <span class="label label-success">Thành Viên</span>
                                                    @else
                                                        <span class="label label-default">Khách</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="label label-{{ $order->getStatus($order->status)['class']}}">
                                                        {{$order->getStatus($order->status)['name']}}
                                                    </span>
                                                </td>
                                                <td>{{$order->created_at}}</td>
                                                <td>


                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif


                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">

                        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-right">Danh sách đơn hàng</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">



                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Top sản phẩm mua nhiều</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach ($topPayProducts as $product)

                            @endforeach
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ asset(pare_url_file($product->picture)) }}"  style="width: 80px;height: 80px;">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title"> {{$product->pay}} Lượt mua
                                    <span class="label label-warning pull-right">{{ number_format($product->price,0,',','.')}} vnđ</span></a>
                                    <span class="product-description">
                                        {{$product->name}}
                                    </span>
                                </div>
                            </li>
                            <!-- /.item -->

                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{route('admin.product.index')}}" class="uppercase">Danh sách sản phẩm</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

<!-- /.content-wrapper -->
@endsection
@section('script')
    <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        let dataOrder=$('#container').attr('data-json');
        dataOrder=JSON.parse(dataOrder);

        let listDay=$('#container2').attr('data-listDay');
        listDay=JSON.parse(listDay);

        let listMoneyMonth=$('#container2').attr('data-money');
        listMoneyMonth=JSON.parse(listMoneyMonth);

        Highcharts.chart('container', {
            chart: {
                styledMode: true
            },

            title: {
                text: 'Thống kê trạng thái đợn hàng'
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },

            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: dataOrder,
                showInLegend: true
            }]
        });
        Highcharts.chart('container2', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Biểu đồ danh thu các ngày trong tháng '
            },
            // subtitle: {
            //     text: 'Source: WorldClimate.com'
            // },
            xAxis: {
                categories:listDay
            },
            yAxis: {
                title: {
                    text: 'Giá trị'
                },
                labels: {
                    formatter: function () {
                        return this.value + '°';
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Hoàn thành giao dịch',
                marker: {
                    symbol: 'square'
                },
                data:listMoneyMonth

            }]
        });
    </script>
@endsection
