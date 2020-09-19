
@extends('layouts.master_fontend')

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
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('auth.components.menu_item')
            </div>
            <div class="col-lg-9">
                <div class="well" style="padding: 19px;margin-bottom: 20px;border: 1px solid #e3e3e3;border-radius: 4px;box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
                    <h2 style="font-size: 25px;font-weight: 400;margin-bottom: 20px">Danh sách sản phẩm yêu thích</h2>
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                          <img src="{{url('/')}}/public/uploads/brand/{{$item->picture}}"  style="width: 80px;height: 80px;">
                                        </td>
                                        <td>
                                          <p>{{$item->name }}</p>
                                        </td>
                                        <td>
                                          <p>{{ number_format($item->price,0,',','.')}}đ</p>
                                        </td>
                                        <td class="shoping__cart__item__close" style="text-align: center">
                                            <a href="{{ route('get.user.delete',$item->id)}} "><span class="icon_close"></span></a>
                                            <a href="{{ route('get.shopping.add',$item->id) }}" style="color: black"><i class="fa fa-shopping-cart"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
@endsection
