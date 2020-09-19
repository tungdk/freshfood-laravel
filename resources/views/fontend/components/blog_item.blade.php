<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="blog__item">
        <div class="blog__item__pic" style="height: 258px">
            <img src="{{url('/')}}/public/uploads/brand/{{$article->picture}}" alt="" style="height: 100%">
        </div>
        <div class="blog__item__text">
            <ul>
                <li><i class="fa fa-calendar-o"></i> {{date('d-m-Y', strtotime($article->created_at))}}</li>
                {{-- <li><i class="fa fa-comment-o"></i> 5</li> --}}
            </ul>
            <h5 style="height: 50px"><a href="{{route('get.blog.detail',$article->slug.'-'.$article->id)}}">{{$article->name}}</a></h5>
            <p style="height: 52px;">{{ mb_strlen($article->description, 'UTF-8') > 80 ? mb_substr($article->description,0,80, "utf-8")."..." : $article->description }} </p>
            <a href="{{route('get.blog.detail',$article->slug.'-'.$article->id)}}" class="blog__btn">Đọc Thêm <span class="arrow_right"></span></a>
        </div>
    </div>
</div>
