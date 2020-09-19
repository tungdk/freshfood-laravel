
@extends('layouts.master_fontend')

@section('content')
   <!-- Hero Section Begin -->
   <section class="hero">
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
                                <h5>035 326 0372</h5>
                                <span>hộ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{asset('public/fontend/img/hero/banner.jpg')}}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Hero Section End -->
    <!-- Featured Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title related__product__title">
                        <h2>Sản Phẩm Mới</h2>
                    </div>
                    <div class="row">
                      @if (isset($productsNew))
                        @foreach ($productsNew as $product)
                             @include('fontend.components.product_item',['product'=>$product])
                        @endforeach
                      @endif
                    </div>
                    <div class="section-title related__product__title">
                        <h2>Sản Phẩm Nổi Bật</h2>
                    </div>
                    <div class="row">
                      @if (isset($productsNew))
                        @foreach ($productsNew as $product)
                             @include('fontend.components.product_item',['product'=>$product])
                        @endforeach
                      @endif
                    </div>
                    <div class="section-title related__product__title">
                        <h2>Sản Phẩm</h2>
                    </div>
                    <div class="row">

                        @if (isset($products))
                            @foreach ($products as $product)
                                @include('fontend.components.product_item',['product'=>$product])
                            @endforeach
                        @endif

                    </div>
                    <div class="col-lg-12">
                        <div class="" style="float: right">
                            {!! $products->appends([])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('public/fontend/img/banner/banner-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('public/fontend/img/banner/banner-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Bài Viết Mới</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (isset($articlesNew))
                    @foreach ($articlesNew as $item)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic" style="height: 258px">
                                    <img src="{{url('/')}}/public/uploads/brand/{{$item->picture}}" alt="" style="height: 100%;">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> {{date('d-m-Y', strtotime($item->created_at))}}</li>

                                    </ul>
                                    <h5 style="height: 50px"><a href="{{route('get.blog.detail',$item->slug.'-'.$item->id)}}">{{$item->name}}</a></h5>
                                    <p style="height: 52px;">{{ mb_strlen($item->description, 'UTF-8') > 80 ? mb_substr($item->description,0,80, "utf-8")."..." : $item->description }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                </div>
        </div>
    </section>

<script src="{{asset('public/fontend/js/jquery-3.3.1.min.js')}}"></script>
<script>
    $(function(){
        $('.js-add-favourite').click(function(event){
            event.preventDefault();
            let $this=$(this);
            let url=$this.attr('href');
                if(url){

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method:'POST',
                        url: url,
                    }).done(function( results ) {
                        console.log(results);

                    });
                }
        })



    })
</script>
@endsection
