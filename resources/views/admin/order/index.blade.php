@extends('layouts.master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Quản lý đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.order.index')}}">Order</a></li>
            <li class="active">List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="col-md-12">

                        <div class="box-header">
                            {{-- <h3 class="box-title"><a href="{{route('admin.order.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3> --}}
                            <form class="form-inline">

                                <input type="text" name="id" value="{{ Request::get('id')}}" placeholder="ID" class="form-control">
                                <input type="text" name="email" value="{{ Request::get('email')}}" placeholder="Email..." class="form-control">
                                <select name="type" id="" class="form-control">
                                    <option value="">Phân loại</option>
                                    <option value="2" {{ Request::get('type')==2 ? "selected='selected'" : ""}}>Khách</option>
                                    <option value="1" {{ Request::get('type')==1 ? "selected='selected'" : ""}}>Thành viên</option>
                                </select>
                                <select name="status" id="" class="form-control">
                                    <option value="0">Trạng thái</option>
                                    <option value="1" {{ Request::get('status')==1 ? "selected='selected'" : ""}}>Tiếp nhận</option>
                                    <option value="2" {{ Request::get('status')==2 ? "selected='selected'" : ""}}>Đang vận chuyển</option>
                                    <option value="3" {{ Request::get('status')==3 ? "selected='selected'" : ""}}>Đã bàn giao</option>
                                    <option value="-1" {{ Request::get('status')==-1 ? "selected='selected'" : ""}} >Hủy bỏ</option>
                                </select>
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"> Tìm kiếm</i></button>
                            </form>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Info</th>
                                        <th>Money</th>
                                        <th>Account</th>
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
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
                                                    <a data-id="{{ $order->id }}" href="{{ route('ajax.admin.order.detail',$order->id) }}" class="btn btn-xs btn-primary js-preview-order"><i class="fa fa-eye" aria-hidden="true"></i> View</a>



                                                    <div class="btn-group" role="group" aria-label="">
                                                        <button type="button" class="btn btn-success btn-xs">Action</button>
                                                        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">xin chào</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="{{ route('admin.order.delete',$order->id) }}" class=""><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li>
                                                                <a href="{{ route('admin.order.action',['process',$order->id]) }}"><i class="fa fa-ban"> Đang bàn giao </i></a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.order.action',['success',$order->id]) }}"><i class="fa fa-ban"> Đã bàn giao</i></a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.order.action',['cancle',$order->id]) }}"><i class="fa fa-ban"> Hủy</i></a>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="col-lg-12">
                    <div class="" style="float: right">
                        {!! $orders->appends($query)->links() !!}
                    </div>
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>

    <div class="modal fade fade" id="modal-preview-order">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Chi tiết đơn hàng <b id="idOrder">#1</b></h4>
                </div>
                <div class="modal-body">
                    <div class="content">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
@endsection
