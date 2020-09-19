@extends('layouts.master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Thêm mới nhà sản xuất
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.user.index')}}">user</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="col-md-12">

                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <form role="form" action="" method="POST">
                               @csrf
                                <div class="box-body">
                                    <div class="col-sm-8">
                                        <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1">Name <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="name" placeholder="Name...">
                                            @if ($errors->first('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1">Email <span class="text-danger">(*)</span></label>
                                            <input type="email" class="form-control" name="email" placeholder="nxtho0109@gmail.com...">
                                            @if ($errors->first('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1">Phone <span class="text-danger">(*)</span></label>
                                            <input type="number" class="form-control" name="phone" placeholder="0247004230...">
                                            @if ($errors->first('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1">Password <span class="text-danger">(*)</span></label>
                                            <input type="password" class="form-control" name="pasword">
                                            @if ($errors->first('pasword'))
                                                <span class="text-danger">{{ $errors->first('pasword') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-12">
                                        <a href="{{route('admin.user.index')}}" class="btn btn-default"> <i class="fa fa-undo"></i> Quay lại</a>
                                        <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i></button>
                                    </div>
                                </div>

                            </form>

                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            {{-- <div class="box-footer">
                Footer
            </div> --}}
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
