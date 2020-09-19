@extends('layouts.master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Quản lý sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.product.index')}}">Product</a></li>
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

                            <form class="form-inline">

                                <input type="text" name="id" value="{{ Request::get('id')}}" placeholder="ID..." class="form-control">
                                <input type="text" name="name" value="{{ Request::get('name')}}" placeholder="Name..." class="form-control">
                                <select name="subcategory_id" id="" class="form-control">
                                    <option value="">Danh Mục</option>
                                    @foreach ($subcategories as $item)
                                        <option value="{{ $item->id }}" {{ Request::get('subcategory_id')==$item->id ? "selected='selected'" : ""}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <select name="publisher_id" id="" class="form-control">
                                    <option value="">Nhà sản xuất</option>
                                    @foreach ($publishers as $item)
                                        <option value="{{ $item->id }}" {{ Request::get('publisher_id')==$item->id ? "selected='selected'" : ""}}>{{$item->name}}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-info"><i class="fa fa-search"> Tìm kiếm</i></button>
                                <h3 class="box-title"><a href="{{route('admin.product.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                            </form>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Info</th>
                                        <th>Avatar</th>
                                        <th>Info</th>
                                        <th>Hot</th>
                                        <th>Status</th>
                                        <th>Qty</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                    @if($products)
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td>
                                                    <ul>
                                                        <li>Name: {{$product->name}}</li>
                                                        <li>Price: {{ number_format($product->price,0,',','.')}} vnđ</li>
                                                        <li>Unit: {{$product->number."/".$product->unit->name}}</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <img src="{{url('/')}}/public/uploads/brand/{{$product->picture}}"  style="width: 80px;height: 80px;">
                                                </td>
                                                <td>{{$product->description}}</td>
                                                <td>
                                                    @if ($product->hot==1)
                                                        <a href="{{route('admin.product.hot',$product->id)}}" class="label label-info">Hot</a>
                                                    @else
                                                        <a href="{{route('admin.product.hot',$product->id)}}" class="label label-default">None</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($product->status==1)
                                                        <a href="{{route('admin.product.active',$product->id)}}" class="label label-info">Show</a>
                                                    @else
                                                        <a href="{{route('admin.product.active',$product->id)}}" class="label label-default">Hide</a>
                                                    @endif
                                                </td>
                                                <td>{{$product->qty}}</td>
                                                <td>{{$product->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.product.update',$product->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                    <a href="{{route('admin.product.delete',$product->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
                <div class="col-12">
                    <div class="" style="float: right">
                        {!! $products->appends($query)->links() !!}
                    </div>
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
