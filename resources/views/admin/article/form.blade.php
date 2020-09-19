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
                    <input type="text" class="form-control" name="name" placeholder="Thịt lợn..." value="{{ $article->name ?? old('name') }}">
                    @if ($errors->first('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" id="" cols="5" class="form-control" rows="2" >{{ $article->description ?? old('description') }}</textarea>
                    @if ($errors->first('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                     @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn danh mục <span class="text-danger">(*)</span></label>
                    <select name="menu_id" id="" class="form-control">
                        <option value="">___Click___</option>
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}" {{ $article->menu->id ?? 0 == $menu->id ? "selected='selected'" : ""}}>
                                {{$menu->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('menu_id'))
                        <span class="text-danger">{{ $errors->first('menu_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Nội dung</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Content</label>
                    <textarea name="content" id="idContent" class="form-control">{{ $article->content ?? '' }}</textarea>
                    @if ($errors->first('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
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
                    <img  src="{{ asset(pare_url_file($article->picture ?? ''))   }}" class="img-thumbnail" onerror="this.onerror=null;this.src='{{asset('public/images/no-image.jpg')}}" alt="" style="width:200px; height:200px">
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
                <a href="{{route('admin.article.index')}}" class="btn btn-default"> <i class="fa fa-undo"></i> Quay lại</a>
                <button type="submit" class="btn btn-success">{{ isset($article) ? "Cập nhật" :"Thêm mới"}} <i class="fa fa-save"></i></button>
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
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
     CKEDITOR.replace( 'idContent',options );

</script>
