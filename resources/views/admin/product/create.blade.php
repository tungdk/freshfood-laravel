@extends('layouts.master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Thêm mới sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.product.index')}}">Product</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="row">
            @include('admin.product.form')
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection 