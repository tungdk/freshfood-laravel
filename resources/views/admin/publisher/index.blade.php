@extends('layouts.master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Quản lý nhà sản xuất
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.publisher.index')}}">Publisher</a></li>
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
                            <h3 class="box-title"><a href="{{route('admin.publisher.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>  
                                        <th>Address</th>  
                                        <th>Time</th>  
                                        <th>Action</th>
                                    </tr>
                                    @if($publishers)
                                        @foreach ($publishers as $publisher)
                                            <tr>
                                                <td>{{$publisher->id}}</td>
                                                <td>{{$publisher->name}}</td>
                                                <td>{{$publisher->email}}</td>
                                                <td>{{$publisher->phone}}</td>
                                                <td>{{$publisher->address}}</td>
                                                <td>{{$publisher->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.publisher.update',$publisher->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                    {{-- <a href="{{route('admin.publisher.delete',$publisher->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> --}}
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