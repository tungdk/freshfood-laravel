
@extends('layouts.master_fontend')

@section('content')
    <!-- Hero Section Begin -->
 <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @if (isset($categories))
                     @include('fontend.components.category_item')
                @endif
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    @include('fontend.components.input_search')
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+84 357004230</h5>
                            <span>hộ trợ 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('auth.components.menu_item')
            </div>
            <div class="col-lg-9">
                <div class="well" style="padding: 19px;margin-bottom: 20px;border: 1px solid #e3e3e3;border-radius: 4px;box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
                    <h2 style="font-size: 25px;font-weight: 400;margin-bottom: 20px">Lịch sử đặt hàng</h2>
                    <div class="box-header">
                        {{-- <h3 class="box-title"><a href="{{route('admin.order.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3> --}}
                        <form class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" name="id" value="{{ Request::get('id')}}" placeholder="ID" class="form-control">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" name="email" value="{{ Request::get('email')}}" placeholder="Email..." class="form-control">
                            </div>

                            <div class="form-group mx-sm-3 mb-2">
                                <select name="status" id="" class="form-control">
                                    <option value="0">Trạng thái</option>
                                    <option value="1" {{ Request::get('status')==1 ? "selected='selected'" : ""}}>Tiếp nhận</option>
                                    <option value="2" {{ Request::get('status')==2 ? "selected='selected'" : ""}}>Đang vận chuyển</option>
                                    <option value="3" {{ Request::get('status')==3 ? "selected='selected'" : ""}}>Đã bàn giao</option>
                                    <option value="-1" {{ Request::get('status')==-1 ? "selected='selected'" : ""}} >Hủy bỏ</option>
                                </select>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"> Tìm kiếm</i></button>
                            </div>

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

                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
@endsection
