
@extends('layouts.master_fontend')
@section('content')
    <!-- Hero Section Begin -->
 <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                    </div>
                    <ul>
                        @if (isset($categories))
                            @foreach ($categories as $category)
                                <li><a href="#">{{$category->name}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" placeholder="Nhập sản phẩm cần tìm kiếm?">
                            <button type="submit" class="site-btn">Tìm Kiếm</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+84 357004230</h5>
                            <span>hộ trợ 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('auth.components.menu_item')
            </div>
            <div class="col-lg-9">
                <h1 style="font-size: 31px;font-weight: 400;">Đăng Ký Tài Khoản</h1>
                <p>Nếu bạn đã đăng ký tài khoản, vui lòng đăng nhập <a href="">Tại Đây</a>.</p>
                <p> <b>Lưu ý:</b> Các mục dấu sao <b>màu đỏ</b> không được bỏ trống &amp; phải điền đầy đủ, chính xác</p>
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <fieldset id="account">
                        <legend style="font-size: 20px;margin-bottom: 20px; color: #333;border: 0;border-bottom: 1px solid #e5e5e5;">Thông tin cá nhân</legend>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label" for="input-firstname" style="text-align: right;font-weight: 500;">Họ tên:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="" placeholder="Nguyễn Văn A..." id="input-firstname" class="form-control">
                                    @if ($errors->first('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label" for="input-email" style="text-align: right;font-weight: 500;">Địa chỉ E-Mail:</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" value="" placeholder="nguyenvana@gmail.com..." id="input-email" class="form-control">
                                    @if ($errors->first('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label" for="input-telephone" style="text-align: right;font-weight: 500;">Điện Thoại:</label>
                                <div class="col-sm-9">
                                    <input type="tel" name="phone" value="" placeholder="097734237..." id="input-telephone" class="form-control">
                                    @if ($errors->first('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend style="font-size: 20px;margin-bottom: 20px; color: #333;border: 0;border-bottom: 1px solid #e5e5e5;">Mật khẩu</legend>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label" for="input-password" style="text-align: right;font-weight: 500;">Mật Khẩu:</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" value="" placeholder="Mật khẩu..." id="input-password" class="form-control">
                                    @if ($errors->first('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group required">
                            <div class="row">
                                <label class="col-sm-3 control-label" for="input-confirm" style="text-align: right;font-weight: 500;">Nhập lại Mật Khẩu:</label>
                                <div class="col-sm-9">
                                    <input type="password" name="confirm" value="" placeholder="Nhập lại mật khẩu..." id="input-confirm" class="form-control">
                                </div>
                            </div>
                        </div> --}}
                    </fieldset>

                    <div class="buttons">
                        <div class="pull-right" style="margin-right: 10px">
                            <input type="submit" value="Đăng ký" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
@endsection
