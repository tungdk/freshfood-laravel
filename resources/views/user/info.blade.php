
@extends('layouts.master_fontend')

@section('content')
<style>
    .js-updateInfo{
        color: #21beff
    }
    .js-updateInfo:hover{
        color: #7fad39
    }
    .nice-select{
        display: none !important;
    }
    select{
        display: block !important;
    }
</style>
    <!-- Hero Section Begin -->
 <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @if (isset($categories))
                     @include('fontend.components.category_item')
                @endif
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    @include('fontend.components.input_search')
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
                <div class="well" style="padding: 19px;margin-bottom: 20px;border: 1px solid #e3e3e3;border-radius: 4px;box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
                    <h2 style="font-size: 25px;font-weight: 400;margin-bottom: 20px">Thông tin tài khoản</h2>
                    <form action="" method="POST">
                        @csrf
                        <div class="checkout__input">
                            <div class="row">
                                <div class="col-3">
                                    <p style="color: #1c1c1c; font-weight: 700;">Name<span>*</span></p>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="lableUpdate">{{ get_data_user('web','name') }}</p>
                                        </div>
                                        <div class="col-5">
                                            <a href="" class="js-updateInfo lableUpdate"><i class="fa fa-edit"></i> Cập nhật</a>
                                        </div>
                                    </div>
                                    <input class="inputUpdate" type="text" name="name" value="{{ get_data_user('web','name') }}" style="display: none">
                                    <input  type="hidden" name="id" value="{{ get_data_user('web','id') }}" >
                                    @if ($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                 @endif
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <div class="row">
                                <div class="col-3">
                                    <p style="color: #1c1c1c; font-weight: 700;">Phone<span>*</span></p>
                                </div>
                                <div class="col-9">
                                    <p class="lableUpdate">{{ get_data_user('web','phone') }}</p>

                                    <input  class="inputUpdate" type="text" name="phone" value="{{ get_data_user('web','phone') }}" style="display: none">
                                    @if ($errors->first('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>


                        <div class="checkout__input">
                            <div class="row">
                                <div class="col-3">
                                    <p style="color: #1c1c1c; font-weight: 700;">Email<span>*</span></p>
                                </div>
                                <div class="col-9">
                                    <p class="lableUpdate">{{ get_data_user('web','email') }}</p>
                                    <input  class="inputUpdate" type="text" name="email" value="{{ get_data_user('web','email') }}" style="display: none">
                                    @if ($errors->first('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>


                        </div>

                        <div class="checkout__input">
                            <div class="row">
                                <div class="col-3">
                                    <p style="color: #1c1c1c; font-weight: 700;">Address</p>
                                </div>
                                <div class="col-9">
                                    <p class="lableUpdate">{{ get_data_user('web','address') ? get_data_user('web','address') : "Chưa có thông tin" }}</p>
                                    <input  class="inputUpdate" type="text" name="address" placeholder="Chưa có thông tin" class="checkout__input__add" value="{{ get_data_user('web','address') }}" style="display: none">
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <div class="row">
                                <div class="col-3">
                                    <p style="color: #1c1c1c; font-weight: 700;">Mật khẩu<span>*</span></p>
                                </div>
                                <div class="col-9">
                                    <p class="lableUpdate">{{ get_data_user('web','password') }}</p>
                                    <input  class="inputUpdate" type="password" name="password" value="{{ get_data_user('web','password') }}" style="display: none">
                                    @if ($errors->first('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>


                        </div>
                        <input type="submit" value="Cập nhật"  style="background: #7fad39;border: #7fad39;display:none" class="btn btn-primary inputUpdate" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
@endsection
