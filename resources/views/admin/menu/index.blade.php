@extends('layouts.master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Quản lý menu
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.menu.index')}}">Menu</a></li>
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
                            <h3 class="box-title"><a href="{{route('admin.menu.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Picture</th>
                                        <th>Hot</th>
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                    @if($menus)
                                        @foreach ($menus as $menu)
                                            <tr>
                                                <td>{{$menu->id}}</td>
                                                <td>{{$menu->name}}</td>
                                                <td>
                                                    <img src="{{ asset(pare_url_file($menu->picture)) }}"  style="width: 80px;height: 80px;">
                                                </td>
                                                <td>
                                                    @if ($menu->hot==1)
                                                        <a href="{{route('admin.menu.hot',$menu->id)}}" class="label label-info">Hot</a>
                                                    @else
                                                        <a href="{{route('admin.menu.hot',$menu->id)}}" class="label label-default">None</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($menu->status==1)
                                                        <a href="{{route('admin.menu.active',$menu->id)}}" class="label label-info">Show</a>
                                                    @else
                                                        <a href="{{route('admin.menu.active',$menu->id)}}" class="label label-default">Hide</a>
                                                    @endif
                                                </td>
                                                <td>{{$menu->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.menu.update',$menu->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                    <a href="{{route('admin.menu.delete',$menu->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
