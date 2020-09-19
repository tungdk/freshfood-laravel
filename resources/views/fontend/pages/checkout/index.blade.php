
@extends('layouts.master_fontend')
<style>
    .nice-select{
        display: none !important;
    }
    select{
        display: block !important;
    }
</style>
@section('content')
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
<!-- Hero Section End -->
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Đơn Hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thông tin đơn hàng</h4>
            <form action="{{route ('get.checkout.pay') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Họ và tên<span>*</span></p>
                                    <input type="text" name="name" value="{{ get_data_user('web','name') }}" placeholder="Nguyễn Văn A">
                                    @if ($errors->first('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="address" placeholder="Số nhà 34, Ngách 15/10" class="checkout__input__add" value="{{ get_data_user('web','address') }}">
                            @if ($errors->first('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Chọn thành phố</p>
                                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                          <option value="">--Chọn tỉnh thành phố--</option>
                                      @foreach($city as $key => $ci)
                                          <option value="{{$ci->matp}}">{{$ci->name}}</option>
                                      @endforeach

                                  </select>
                                  @if ($errors->first('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Chọn quận huyện</p>
                                    <select name="district" id="district" class="form-control input-sm m-bot15 district choose">
                                        <option value="">--Chọn quận huyện--</option>
                                    </select>
                                    @if ($errors->first('district'))
                                    <span class="text-danger">{{ $errors->first('district') }}</span>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Chọn xã phường</p>
                                    <select name="ward" id="ward" class="form-control input-sm m-bot15 ward">
                                        <option value="">--Chọn xã phường--</option>
                                    </select>
                                    @if ($errors->first('ward'))
                                    <span class="text-danger">{{ $errors->first('ward') }}</span>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone" value="{{ get_data_user('web','phone') }}" placeholder=" +84 357004230">
                                    @if ($errors->first('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" value="{{ get_data_user('web','email') }}" placeholder="nguyen@gmail.com">
                                    @if ($errors->first('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú<span></span></p>
                            <input type="text" name="note"
                                placeholder="Hàng dễ vỡ vui lòng nhẹ tay.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Thông tin đơn hàng</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                            <ul>
                                @foreach ($shopping as $item)
                                    <li>{{$item->name}} <span>{{ number_format($item->price*$item->qty,0,',','.')}}đ</span></li>
                                @endforeach

                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>{{ Cart::subtotal(0) }}</span></div>
                            <div class="checkout__order__total">Total <span>{{ Cart::subtotal(0) }}</span></div>

                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            <button type="submit" class="site-btn js-submit-order">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->


@endsection

