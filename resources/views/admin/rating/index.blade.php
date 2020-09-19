@extends('layouts.master_admin')
<style>
    .rating span i {
        color: darkgray
    }
    .rating span.active i {
        color: #EDBB0E
    }
</style>
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Quản lý đánh giá sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.rating.index')}}">Rating</a></li>
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

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Content</th>
                                        <th>Product</th>
                                        <th>User</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                    @if($ratings)
                                        @foreach ($ratings as $rating)
                                            <tr>
                                                <td>{{$rating->id}}</td>
                                                <td>{{$rating->content}}</td>
                                                <td>
                                                   {{$rating->product->name}}
                                                </td>
                                                <td>
                                                    {{$rating->user->name}}
                                                </td>
                                                <td>
                                                    <div class="rating">
                                                        @for ($i = 1; $i <=5; $i++)
                                                            <span class="{{$i <=$rating->number ? 'active' : ''}}"><i class="fa fa-star"></i></span>
                                                        @endfor
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($rating->status==1)
                                                        <a href="{{route('admin.rating.active',$rating->id)}}" class="label label-info">Show</a>
                                                    @else
                                                        <a href="{{route('admin.rating.active',$rating->id)}}" class="label label-default">Hide</a>
                                                    @endif
                                                </td>
                                                <td>{{$rating->created_at}}</td>
                                                <td>

                                                    <a href="{{route('admin.rating.delete',$rating->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
