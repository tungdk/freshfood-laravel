
@extends('layouts.master_fontend')
@section('content')
<style>
    .js-update-item-cart:hover{
        color: black;
    }
    .js-update-item-cart{
        background-color: #7fad39;
        color: white;
        padding: 4px;
        border-radius: 5px;
    }
    .item-delete{
        background-color: #dd2222;
        color: white;
        padding: 4px;
        border-radius: 5px;
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
<!-- Hero Section End -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('public/fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <a href="./index.html">Giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

  <!-- Shoping Cart Section Begin -->
  <section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shopping as $key => $item)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{url('/')}}/public/uploads/brand/{{$item->options->picture}}}"  style="width: 80px;height: 80px;">
                                        <h5>{{$item->name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">

                                            <p>{{ number_format($item->price,0,',','.')}}đ</p>
                                            @if ($item->options->price_old)
                                             <p>   <span style="text-decoration: line-through"> {{ number_format(number_price($item->options->price_old),0,',','.') }} đ</span></p>
                                             @endif
                                            <p>
                                                <span>
                                                    -{{$item->options->sale}}%
                                                </span>

                                            </p>
                                    </td>
                                    <td class="">



                                        <div>
                                            <input type="number" min="1" value="{{$item->qty}}" class="js-qty">
                                            {{-- <input type="number" min="1" value="4" class="js-qty"> --}}
                                        </div>
                                        <div style="margin-top: 10px">
                                            <a href="{{route('ajax.get.shopping.update',$key)}}" data-idProduct={{$item->id}} class="js-update-item-cart" >Cập nhật</a>
                                            <a href="{{ route('get.shopping.delete',$key) }}"  class="item-delete">Xóa</a>
                                        </div>


                                    </td>
                                    <td class="shoping__cart__total">
                                        {{ number_format($item->price*$item->qty,0,',','.')}}đ
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('home') }}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                    {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a> --}}
                </div>
            </div>
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>{{ Cart::subtotal(0) }}đ</span></li>
                        <li>Total <span>{{ Cart::subtotal(0) }}đ</span></li>
                    </ul>
                    <a href="{{ route('get.checkout')}}" class="primary-btn">Đặt đơn hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection
@section('script')
<script src="{{asset('public/fontend/js/jquery-3.3.1.min.js')}}"></script>
<script>

    $(function(){
        $('.js-update-item-cart').click(function(event){
            event.preventDefault();
            let $this=$(this);
            let url=$this.attr('href');
            let qty=$('.js-qty').val();
            // let qty=$this.prev().val();
            // console.log(qty);

            let idProduct=$this.attr('data-idProduct')
            $.ajax({
                url: url,
                data: { qty: qty,idProduct:idProduct}
                })
                .done(function( msg ) {

                    toastr.success(msg.messages);
                    window.location.reload();
                });
            })
    })
</script>
@endsection
