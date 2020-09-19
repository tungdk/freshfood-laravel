
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
<!-- Hero Section End -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('public/fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giảm giá</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <a href="./index.html">Giảm giá</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
 <!-- Blog Section Begin -->
 <section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    @if (isset($productsSale))
                        @foreach ($productsSale as $product)
                            @include('fontend.components.product_item',['product'=>$product])
                        @endforeach
                    @endif

                    <div class="col-lg-12">
                        <div class="" style="float: right">
                            {!! $productsSale->appends([])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

@endsection
