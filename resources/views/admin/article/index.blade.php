@extends('layouts.master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Quản lý bài viết
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.article.index')}}">Article</a></li>
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
                            <h3 class="box-title"><a href="{{route('admin.article.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Avatar</th>
                                        <th>Content</th>
                                        <th>Description</th>
                                        <th>Hot</th>
                                        <th>Status</th>

                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                    @if($articles)
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td>{{$article->id}}</td>
                                                <td>{{$article->name}}</td>
                                                <td><span class="lable lable-success">{{$article->menu->name}}</span></td>
                                                <td>
                                                    <img src="{{url('/')}}/public/uploads/brand/{{$article->picture}} "  style="width: 80px;height: 80px;">
                                                </td>
                                                <td>
                                                    <p style="margin: 0 0 10px;
                                                    overflow: auto;
                                                    height: 100px;
                                                    width: 300px;">{{$article->content}}</p>
                                                </td>
                                                <td> <p style="margin: 0 0 10px;
                                                    overflow: auto;
                                                    height: 100px;
                                                    width: 200px;">{{$article->description}}</p></td>
                                                <td>
                                                    @if ($article->hot==1)
                                                        <a href="{{route('admin.article.hot',$article->id)}}" class="label label-info">Hot</a>
                                                    @else
                                                        <a href="{{route('admin.article.hot',$article->id)}}" class="label label-default">None</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($article->status==1)
                                                        <a href="{{route('admin.article.active',$article->id)}}" class="label label-info">Show</a>
                                                    @else
                                                        <a href="{{route('admin.article.active',$article->id)}}" class="label label-default">Hide</a>
                                                    @endif
                                                </td>

                                                <td>{{$article->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.article.update',$article->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                    <a href="{{route('admin.article.delete',$article->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
