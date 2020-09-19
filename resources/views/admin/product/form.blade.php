<form role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-8">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Name <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Thịt lợn..." value="{{ $product->name ?? old('name') }}">
                    @if ($errors->first('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giá bán</label>
                            <input type="number" class="form-control" name="price" placeholder="150.000" value="{{ $product->price ?? old('price',0) }}">
                            @if ($errors->first('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                             @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giảm giá</label>
                            <input type="number" class="form-control" name="sale" placeholder="5%" value="{{ $product->sale ?? old('sale',0) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng</label>
                            <input type="text" class="form-control" name="qty" placeholder="10" value="{{ $product->qty ?? old('qty',0) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng trên 1 đơn vị tính</label>
                            <input type="text" class="form-control" name="number" placeholder="100g" value="{{ $product->number ?? old('number',1) }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" id="" cols="5" class="form-control" rows="2" >{{ $product->description ?? old('description') }}</textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn danh mục con <span class="text-danger">(*)</span></label>
                    <select name="subcategory_id" id="" class="form-control">
                        <option value="">___Click___</option>
                        @foreach ($subcategories as $category)
                            <option value="{{$category->id}}" {{ $product->subcategory->id ?? 0 == $category->id ? "selected='selected'" : ""}}>
                                {{$category->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('subcategory_id'))
                        <span class="text-danger">{{ $errors->first('subcategory_id') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn đơn vị tính<span class="text-danger">(*)</span></label>
                    <select name="unit_id" id="" class="form-control">
                        <option value="">___Click___</option>
                        @foreach ($units as $unit)
                            <option value="{{$unit->id}}" {{ $product->unit->id ?? 0 == $unit->id ? "selected='selected'" : ""}}>
                                {{$unit->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('unit_id'))
                        <span class="text-danger">{{ $errors->first('unit_id') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nhà sản xuất <span class="text-danger">(*)</span></label>
                    <select name="publisher_id" id="" class="form-control">
                        <option value="">___Click__</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{$publisher->id}}" {{ $product->publisher->id ?? 0 == $publisher->id ? "selected='selected'" : ""}}>
                                {{$publisher->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('publisher_id'))
                        <span class="text-danger">{{ $errors->first('publisher_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        {{-- <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông số khác</h3>
            </div>
            <div class="box-body">

            </div>
        </div> --}}
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Nội dung</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Content</label>
                    <textarea name="info" id="idContent" cols="5" rows="2" class="form-control">{{ $product->info ?? '' }}</textarea>
                    @if ($errors->first('info'))
                    <span class="text-danger">{{ $errors->first('info') }}</span>
                 @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">


        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Ảnh đại diện</h3>
            </div>
            <div class="box-body block-images">
                <div style="margin-bottom: 10px">
                    <img  src="{{url('/')}}/public/uploads/brand/{{$product->picture}}" class="img-thumbnail" onerror="this.onerror=null;this.src='{{asset('public/images/no-image.jpg')}}" alt="" style="width:200px; height:200px">
                </div>
                <div style="position: relative;">
                    <a href="javascript:;" class="btn btn-primary">Choose File....
                        <input type="file" style="position:absolute;z-index:2;top:0;left:0;opacity:0;background-color:transparent"
                        name="picture" size="40" class="js-upload">
                    </a>
                    &nbsp;
                    <span class="label label-info" id="upload-file-info"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 clearfix">
       <div class="box-footer text-center">
            <div class="col-sm-12">
                <a href="{{route('admin.product.index')}}" class="btn btn-default"> <i class="fa fa-undo"></i> Quay lại</a>
                <button type="submit" class="btn btn-success">{{ isset($product) ? "Cập nhật" :"Thêm mới"}} <i class="fa fa-save"></i></button>
            </div>
       </div>
    </div>
</form>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        entities_latin:false
    };
     CKEDITOR.replace( 'idContent',options );

</script>
