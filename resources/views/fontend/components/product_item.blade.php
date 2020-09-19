
<div class="col-lg-3 col-md-4 col-sm-4" style="margin-bottom: 60px">
    <div class="product__discount__item">
        <div class="product__discount__item__pic set-bg"
            data-setbg="{{url('/')}}/public/uploads/brand/{{$product->picture}}">
            @if($product->qty==0)
                <div class="product__discount__percent">
                    hết
                </div>
            @else
                @if ($product->sale>0)
                    <div class="product__discount__percent">
                        -{{$product->sale}}%
                    </div>
                @endif
            @endif
            <ul class="product__item__pic__hover">
                <li><a href="{{ route('ajax_get.user.add_favourite',$product->id) }} " class="{{ !Auth::id() ? 'js-show-login' : 'js-add-favourite'}}"><i class="fa fa-heart"></i></a></li>
                <li><a href="{{ route('get.shopping.add',$product->id) }}"><i class="fa fa-shopping-cart  "></i></a></li>
            </ul>
        </div>
        <div class="product__discount__item__text">
            {{-- <span>Dried Fruit</span> --}}
            <h5><a href="{{route('get.product.detail',$product->slug.'-'.$product->id)}}">{{$product->name}}</a></h5>
            <div class="product__item__price">
               @php
                   $tg=((100-$product->sale)*$product->price)/100;
               @endphp
                @if ($product->sale)
                        {{ number_format($tg,0,',','.')}} đ
                    <span style=""> {{ number_format($product->price,0,',','.')}} đ </span>
                @else
                    {{ number_format($product->price,0,',','.')}} đ
                @endif
            </div>
        </div>
    </div>
</div>
