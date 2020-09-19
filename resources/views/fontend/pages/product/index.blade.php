
@extends('layouts.master_fontend')
@section('content')
<style>
    .product__discount__percent{
        height: 45px;
        width: 45px;
        background: #dd2222;
        border-radius: 50%;
        font-size: 14px;
        color: #ffffff;
        line-height: 45px;
        text-align: center;
        position: absolute;
        left: 15px;
        top: 15px;
    }
    .inputSelect .nice-select{
        line-height: 27px;
    }
</style>
 <!-- Hero Section Begin -->
 <section class="hero hero-normal" style="">
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
<!-- Hero Section End -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('public/fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Tìm kiếm</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <a href="./index.html">Tìm kiếm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">

                    @if (isset($publishers))
                        <div class="sidebar__item">
                            <h4>Nhà Sản Xuất</h4>
                            <ul>
                                {{-- {{request()->fullUrlWithQuery(['publisher'=>$publisher['id']]) }} --}}
                                @foreach ($publishers as $publisher)
                                    <li><a href="{{ url('san-pham')."?publisher=".$publisher->id}}">{{$publisher->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (isset($subcategoriesInvolve))
                        @if (count($subcategoriesInvolve)>0)
                            <div class="sidebar__item">
                                <h4>Danh mục con</h4>
                                <ul>
                                    @foreach ($subcategoriesInvolve as $subcategory)
                                        <li><a href="{{request()->fullUrlWithQuery(['subcategory'=>$subcategory['id']]) }}">{{$subcategory->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endif


                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    <div class="col-12">
                        <div class="sidebar__item">
                            <h4>Thông tin tìm kiếm</h4>
                        </div>
                        <form class="form-inline" style="margin-bottom: 30px">
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" name="name" value="{{ Request::get('name')}}" placeholder="Tên sản phẩm " class="form-control">
                            </div>

                            <div class="form-group mx-sm-3 mb-2">
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"> Tìm kiếm</i></button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                            <h6>
                            <span>

                                    {{$productsSearch->count()}}

                            </span> sản phẩm</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (isset($productsSearch))
                        @foreach ($productsSearch as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{url('/')}}/public/uploads/brand/{{$product->picture}}">
                                        @if($product->sale)
                                            <div class="product__discount__percent" style="">-{{$product->sale}}%</div>
                                        @endif
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            {{-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> --}}
                                            <li><a href="{{ route('get.shopping.add',$product->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{route('get.product.detail',$product->slug.'-'.$product->id)}}">{{$product->name}}</a></h6>
                                        <h5>
                                            @php
                                                $tg=((100-$product->sale)*$product->price)/100;
                                            @endphp
                                            @if ($product->sale)
                                                    {{ number_format($tg,0,',','.')}} đ
                                                <span style="text-decoration:line-through;font-weight:400;font-size: 14px;
                                                color: #b2b2b2;"> {{ number_format($product->price,0,',','.')}} đ </span>
                                            @else
                                                {{ number_format($product->price,0,',','.')}} đ
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
                <div class="col-lg-12">
                    <div class="" style="float: right">
                        {!! $productsSearch->appends($query)->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->



    <!-- Blog Section End -->
@endsection
