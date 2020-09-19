@extends('layouts.master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Quản lý danh mục sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.category.index')}}">Category</a></li>
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
                            <h3 class="box-title"><a href="{{route('admin.category.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Hot</th>
                                        <th>Status</th>  
                                        <th>Time</th>  
                                        <th>Action</th>
                                    </tr>
                                    @if($categories)
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td><i class="{{$category->icon}}" aria-hidden="true"></i></a></td>
                                                <td>
                                                    @if ($category->hot==1)
                                                        <a href="{{route('admin.category.hot',$category->id)}}" class="label label-info">Hot</a>
                                                    @else
                                                        <a href="{{route('admin.category.hot',$category->id)}}" class="label label-default">None</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($category->status==1)
                                                        <a href="{{route('admin.category.active',$category->id)}}" class="label label-info">Show</a>
                                                    @else
                                                        <a href="{{route('admin.category.active',$category->id)}}" class="label label-default">Hide</a>
                                                    @endif
                                                </td>
                                                <td>{{$category->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.category.update',$category->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                    {{-- <a href="{{route('admin.category.delete',$category->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> --}}
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