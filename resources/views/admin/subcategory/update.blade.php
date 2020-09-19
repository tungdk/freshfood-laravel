@extends('layouts.master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Cập nhật danh mục con của sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.subcategory.index')}}">SubCategory</a></li>
            <li class="active">Update</li>
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
                                            <input type="text" class="form-control" value="{{ $subcategory->name }}" name="name" placeholder="Name...">
                                            @if ($errors->first('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Thể loại <span class="text-danger">(*)</span></label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">___Click__</option>
                                                @foreach ($categories as $catergory)
                                                    <option value="{{$catergory->id}}" {{ $subcategory->catergory->id ?? 0 == $catergory->id ? "selected='selected'" : ""}}>
                                                        {{$catergory->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->first('category_id'))
                                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1">Description <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control"  value="{{ $subcategory->description }}" name="description" placeholder="Name...">
                                            @if ($errors->first('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <a href="{{route('admin.subcategory.index')}}" class="btn btn-default"> <i class="fa fa-undo"></i> Quay lại</a>
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