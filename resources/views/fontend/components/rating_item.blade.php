<div class="col-12" style="margin-bottom: 15px;margin-left: 10px;">
    <div class="col-12">
        <div class="rating">
            <span style="font-weight: 700">{{$rating->user->name}}</span>
            <span class="item_success" style="color: #7fad39"><i class="fa fa-check-circle" style="margin: 0 2px"></i> Đã mua hàng tại EkkoShop</span>
        </div>
        <div class="item_review">
            <span id="item_review">
                @for ($i = 1; $i <=5; $i++)
                    <i class="fa fa-star {{$i <=$rating->number ? 'active' : '' }}" style="margin: 0 2px"></i>
                @endfor
            </span>
            {{$rating->content}}
        </div>
        <div class="item_footer">
            <span class="item_time" style="color: darkgray"><i class="fa fa-clock-o" style="margin: 0 2px"></i> đánh giá {{$rating->created_at}} </span>
        </div>
    </div>
</div>
