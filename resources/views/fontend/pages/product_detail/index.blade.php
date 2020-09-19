
@extends('layouts.master_fontend')
<style>
    .product__details__tab .nav-tabs:before {
        position: absolute;
        left: 0;
        top: 12px;
        height: 1px;
        width: 323px !important;
        background: #ebebeb;
        content: "";
    }
    .product__details__tab .nav-tabs:after {
        position: absolute;
        right: 0;
        top: 12px;
        height: 1px;
        width: 324px !important;
        background: #ebebeb;
        content: "";
    }
    .cart{
        display: inline-block !important;
        font-size: 14px !important;
        padding: 10px 28px 10px !important;
        color: #ffffff !important;
        text-transform: uppercase !important;
        font-weight: 700;
        background: #7fad39 !important;
        letter-spacing: 2px;
    }
    .cart:hover{
        color: #ffffff;
    }
    #ratings .fa-star{
        color: #b2b2b2
    }
    #ratings .active{
        color: #EDBB0E
    }
    .item_review .fa-star{
        color: #b2b2b2
    }
    .item_review .active{
        color: #EDBB0E
    }
    .btn-load-rating{
        border: 1px solid;
        padding: 0 10px;
        border-radius: 8px;
        line-height: 40px;
    }
    .btn-load-rating:hover{
        color: #03a9f4
    }
</style>
@section('content')

 <!-- Hero Section Begin -->
 <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    @if (isset($categories))
                        @include('fontend.components.category_item')
                    @endif
                </div>
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
                    <h2>{{$product->name}}</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <a href="./index.html">Vegetables</a>
                        <span>{{$product->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        @if($product->sale)
                            <div style="height: 45px;
                            width: 45px;
                            background: #dd2222;
                            border-radius: 50%;
                            font-size: 14px;
                            color: #ffffff;
                            line-height: 45px;
                            text-align: center;
                            position: absolute;
                            left: 30px;
                            top: 20px;">{{$product->sale}}%</div>
                        @endif
                        <img class="product__details__pic__item--large"
                            src="{{ asset(pare_url_file($product->picture)) }}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="{{ asset(pare_url_file($product->picture)) }}"
                            src="{{ asset(pare_url_file($product->picture)) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$product->name}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">
                        @php
                            $tg=((100-$product->sale)*$product->price)/100;
                        @endphp
                        @if ($product->sale)
                                {{ number_format($tg,0,',','.')}} đ
                            <span style="text-decoration: line-through;font-size: 20px;color: #b2b2b2;"> {{ number_format($product->price,0,',','.')}} đ </span>
                        @else
                            {{ number_format($product->price,0,',','.')}} đ
                        @endif
                    </div>

                    <form action="{{route('get.shopping.portCart')}}" method="POST">
                        @csrf
                        <div class="" style="">
                            <div class="">
                                <label>Số lượng:</label>
                                <input type="number" value="1" name="qty">
                                <input name="productid_hidden" type="hidden"  value="{{$product->id}}" />
                            </div>
                        </div>
                        <a href="{{ route('get.shopping.addnow',$product->id) }}" class="cart">Mua Ngay</a>
                        <button type="submit" class="btn btn-fefault cart" >
                            <i class="fa fa-shopping-cart"></i>
                           Thêm vào giỏ Hàng
                        </button>

                    </form>
                    <a href="{{ route('ajax_get.user.add_favourite',$product->id) }}" class="heart-icon  {{ !Auth::id() ? 'js-show-login' : 'js-add-favourite'}}"><span class="icon_heart_alt"></span></a>

                    <ul>
                        <li><b>Hãng sản xuất</b> <span>{{$product->publisher->name}}</span></li>
                        <li><b>Tình trạng</b> <span>
                            @if ($product->qty <1)
                                Hết hàng
                            @else
                                Còn hàng
                            @endif
                        </span></li>

                        <li><b>Đơn vị</b> <span>{{$product->number."/".$product->unit->name}}</span></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Phương thức giao hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Đánh giá <span>({{$product->review_total}})</span></a>
                        </li>
                    </ul>
                    @php
                        $age=0;
                        if($product->review_total > 0){
                            $age=round($product->review_star / $product->review_total,2);
                        }
                    @endphp
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Mô tả sản phẩm</h6>
                                <div class="info"></div>



                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <div class="tab-pane active" id="tab-contentshipping">
                                    <div><img src="https://organicfood.vn/image/catalog/processorder.jpg" style="width: 788px;"><br></div>
                                    <div><br></div>
                                    <div>
                                        <div>CHÍNH SÁCH GIAO HÀNG&nbsp; ÁP DỤNG 11/2019- 11/2020</div>
                                        <div><br></div>
                                        <div>&nbsp; &nbsp; 1. Đơn hàng từ dưới 199.000 VNĐ&nbsp;</div>
                                        <div>Với các đơn hàng dưới 199K, các bạn, các chị vui lòng đến nhận hàng tại các cửa hàng ekko.vn&nbsp;&nbsp;</div>
                                        <div><br></div>
                                        <div>Quận Hai Bà Trung: 123 Minh Khai&nbsp;</div>
                                        <div>Quận Đống Đa: 69 Phương Mai, Phường Phương Mai Hoặc Organicfood.vn hỗ trợ đặt giao hàng từ bên thứ 3 ( Grap, Uber, Go Việt….), chi phí được báo trước cho quý khách&nbsp;</div>
                                        <div><br></div>
                                        <div>&nbsp; &nbsp; &nbsp;2. Đơn hàng từ 199.000 đến dưới 499.000 VNĐ&nbsp;</div>
                                        <div><br></div>
                                        <div>- Bán kính 1-5 km: Miễn phí;&nbsp;</div>
                                        <div>- Bán kính 5-10km: 20.000 VNĐ;&nbsp;</div>
                                        <div>- Bán kính dưới 13km: 30.000 VNĐ.&nbsp;</div>
                                        <div>&nbsp; &nbsp;&nbsp;</div>
                                        <div>3&nbsp; &nbsp;Đơn hàng trên 499.000 VNĐ&nbsp;</div>
                                        <div><br></div>
                                        <div>- Bán kính dưới 13km: Miễn phí</div>
                                        <div>- Trên 13km, Organicfood.vn sẽ giao đến chành xe hoặc đơn vị vận chuyển được chỉ định bởi khách hàng. Khách hàng thanh toán trước giá trị đơn hàng và chi phí vận chuyển cho Organicfood.Vn&nbsp;</div>
                                        <div><br></div>
                                        <div>&nbsp; &nbsp; 4. Chính sách giao hàng đặc biệt</div>
                                        <div><br></div>
                                        <div>&nbsp;Đơn hàng từ 1.500.000 VNĐ trở lên: Giao hàng miễn phí trong bán kính 13km.</div>
                                        <div><br></div>
                                        <div>&nbsp;+ Giao hàng riêng không ghép đơn hàng khác; + Thời gian giao hàng nhanh nhất; + Ưu tiên giao hàng so với các đơn hàng khác.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">

                                <div class="row">
                                    <div class="col-2 text-center" style="align-self: center;">

                                           <p style="font-size: 30px; color: #EDBB0E">{{ $age }}</p>
                                        </span><i class="fa fa-star"  style="font-size: 30px; color: #EDBB0E"></i> <span>

                                    </div>
                                    <div class="col-7">
                                        @foreach ($ratingDefault as $key =>$item)
                                            <div class=" d-flex justify-content-center">
                                                <span> {{$key}} <i class="fa fa-star" style="margin-right: 10px;margin-left: 5px"></i></span>
                                                @php
                                                    $tg=0;
                                                    if ($product->review_total>0){
                                                        $tg=($item['count']/$product->review_total)*100;
                                                    }
                                                @endphp
                                                <div class="progress" style="width: 400px;height: 13px">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $tg }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span style="margin-left: 15px;color: #03a9f4"><b style="margin-right: 3px">{{$item['count']}}</b>Đánh giá</span>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="col-3" style="align-self: center;">

                                            <button type="submit" class="btn btn-info {{ Auth::check() ? 'js-review' : 'js-show-login'}}"  style="background-color: #03a9f4">
                                                Gửi đánh giá
                                             </button>

                                    </div>
                                </div>


                                <div class="block-reviews" id="block-review" style="display: none">
                                    <div class="col-12">
                                        <form class="" method="POST" action="{{route('ajax_post.user.rating_add')}}" id="form-review">
                                            <div class="form-group">
                                                <div class="input-rating">
                                                    <p>Chọn đánh giá của bạn: <span>Click vào để chọn sao</span></p>
                                                    <span id="ratings">
                                                        @for ($i = 1; $i <=5; $i++)
                                                            <i class="fa fa-star active" data-i="{{ $i }}"></i>
                                                        @endfor
                                                    </span>
                                                    <span class="reviews-text" id="reviews-text">Tuyệt vời</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="content" id="" cols="5" class="form-control" rows="5" placeholder="Nhập đánh giá sản phẩm (Tối thiểu 80 ký tự)"></textarea>
                                            </div>
                                            <input type="hidden" name="review" id="review_value" value="5">
                                            <input type="hidden" name="product_id"  value="{{$product->id}}">
                                            <button type="submit" class="btn btn-success js-process-review" >
                                                Gửi đánh giá
                                             </button>
                                        </form>
                                    </div>

                                </div>
                                <div class="row review_list" style="padding-top: 40px">
                                    @if (isset($ratings))
                                        @foreach ($ratings as $item)
                                            <div class="col-12" style="margin-bottom: 15px;margin-left: 10px;">
                                                <div class="col-12">
                                                    <div class="item">
                                                        <span style="font-weight: 700">{{$item->user->name}}</span>
                                                        <span class="item_success" style="color: #7fad39"><i class="fa fa-check-circle" style="margin: 0 2px"></i> Đã mua hàng tại EkkoShop</span>
                                                    </div>
                                                    <div class="item_review">
                                                        <span id="item_review">
                                                            @for ($i = 1; $i <=5; $i++)
                                                                <i class="fa fa-star {{$i <=$item->number ? 'active' : '' }}" style="margin: 0 2px"></i>
                                                            @endfor
                                                        </span>
                                                        {{$item->content}}
                                                    </div>
                                                    <div class="item_footer">
                                                        <span class="item_time" style="color: darkgray"><i class="fa fa-clock-o" style="margin: 0 2px"></i> đánh giá {{$item->created_at}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-lg-12">
                                            <div class="" style="float: right">
                                                {!! $ratings->appends([])->links() !!}
                                            </div>
                                        </div>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($productSuggests as $item)
                @include('fontend.components.product_item',['product'=>$item])
            @endforeach
        </div>
    </div>

</section>
<script src="{{asset('public/fontend/js/jquery-3.3.1.min.js')}}"></script>
<script>
    $(document).ready(function(){
        let info = <?php echo json_encode($product->info);?>;
        console.log(info);
        $('.info').html(info);
    })
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
                        toastr.success(results.messages);

                    });
                }
        })
        // show form review
        $('.js-review').click(function(event){
            event.preventDefault();
            let $this=$(this);
           if($this.hasClass('js-check-login')){
                toastr.warning("Bạn phải đăng nhập để thực hiện chức năng này");
                return false;
           }
           if ($(this).hasClass('active')){
               $(this).text("Gửi Đánh giá").addClass("btn-success").removeClass("btn-default active")
           }else{
               $(this).text("Đóng lại").addClass("btn-default active").removeClass("btn-success")
           }
           $("#block-review").slideToggle();
        })
        // hover icon thay đổi

        let $item=$("#ratings i");
        let arrTextRating={
            1:"Không thích",
            2:"Tạm được",
            3:"Bình thường",
            4:"Rất tốt",
            5:"Tuyệt vời"
        }
        $item.mouseover(function(){
            let $this=$(this);
            let $i=$this.attr('data-i');
            $('#review_value').val($i);
            $item.removeClass('active');
            $item.each( function(key,value){
                if( key + 1 <= $i ){
                    $(this).addClass('active')
                }
            })
            $('#reviews-text').text(arrTextRating[$i]);
        })

        $('.js-process-review').click(function(event){
            event.preventDefault();
            let $this=$(this);
            let url=$this.parents('form').attr('action');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method:'POST',
                url: url,
                data:$('#form-review').serialize(),
            }).done(function( results ) {
                $('#form-review')[0].reset();
                $('.js-review').trigger('click');

                if (results.html) {
                    $('.review_list').prepend(results.html);
                }
                toastr.success(results.messages);
            });
        })
    })
</script>
@endsection
