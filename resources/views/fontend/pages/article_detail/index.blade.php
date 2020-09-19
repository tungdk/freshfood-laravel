
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
    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{asset('public/fontend/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>{{$article->name}}</h2>
                        <ul>
                            {{-- <li>By Michael Scofield</li> --}}
                            {{-- <li>January 14, 2019</li> --}}
                            {{-- <li>8 Comments</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->
  <!-- Blog Details Section Begin -->
  <section class="blog-details spad">
    <div class="container">
        <div class="row">

            <div class="order-md-1 order-1">
                <div class="blog__details__text" style="text-align: center">
                    <img src="{{url('/')}}/public/uploads/brand/{{$article->picture}}" alt="" >

                </div>
                <div class="info"></div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Bài viết liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if (isset($articlesNew))
                @foreach ($articlesNew as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic" style="height: 258px">
                                <img src="{{url('/')}}/public/uploads/brand/{{$item->picture}}" alt="" style="height: 100%">
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
<!-- Related Blog Section End -->

@endsection
<script src="{{asset('public/fontend/js/jquery-3.3.1.min.js')}}"></script>

<script>
     $(document).ready(function(){
        let info = <?php echo json_encode($article->content);?>;
        $('.info').html(info);
    });
</script>
