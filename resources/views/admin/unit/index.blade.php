@extends('layouts.master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Quản lý đơn vị tính
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.unit.index')}}">Unit</a></li>
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
                            <h3 class="box-title"><a href="{{route('admin.unit.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                    @if($units)
                                        @foreach ($units as $unit)
                                            <tr>
                                                <td>{{$unit->id}}</td>
                                                <td>{{$unit->name}}</td>
                                                <td>{{$unit->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.unit.update',$unit->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                    <a href="{{route('admin.unit.delete',$unit->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
