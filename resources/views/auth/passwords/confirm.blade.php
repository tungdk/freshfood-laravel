
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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well" style="padding: 19px;margin-bottom: 20px;border: 1px solid #e3e3e3;border-radius: 4px;box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
                            <h2 style="font-size: 25px;font-weight: 400;margin-bottom: 20px">Thiết lập mật khẩu mới</h2>

                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Mật khẩu mới:</label>
                                    <input type="password" name="password" value="" placeholder="*******" id="input-password" class="form-control">
                                    @if ($errors->first('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Xác nhận mật khẩu:</label>
                                    <input type="password" name="password_confirm" value="" placeholder="*******" id="input-password" class="form-control">
                                    @if ($errors->first('password_confirm'))
                                        <span class="text-danger">{{ $errors->first('password_confirm') }}</span>
                                    @endif

                                </div>

                                <input type="submit" value="Gửi xác nhận"  style="background: #7fad39;border: #7fad39" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
@endsection
