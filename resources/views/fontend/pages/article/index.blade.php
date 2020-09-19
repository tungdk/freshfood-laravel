
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
                    <h2>Bài viết</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <a href="./index.html">Bài viết</a>
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
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    {{-- <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div> --}}
                    <div class="blog__sidebar__item">
                        <h4>Danh mục bài viết</h4>
                        <ul>
                            @if (isset($menus))
                                @foreach ($menus as $menu)
                                    <li><a href="{{ request()->fullUrlWithQuery(['category'=>$menu['id']]) }}">{{$menu->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Bài viết liên quan</h4>
                        <div class="blog__sidebar__recent">
                            @if (isset($articlesNew))
                                @foreach ($articlesNew as $article)
                                    <a href="{{route('get.blog.detail',$article->slug.'-'.$article->id)}}" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="{{url('/')}}/public/uploads/brand/{{$article->picture}}" alt="" style="width: 100px;">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>{{$article->name}}</h6>
                                            <span>{{date('d-m-Y', strtotime($article->created_at))}}</span>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    @if (isset($articles))
                        @foreach ($articles as $article)
                            @include('fontend.components.blog_item',['article'=>$article])
                        @endforeach
                    @endif

                    <div class="col-lg-12">
                        <div class="" style="float: right">
                            {!! $articles->appends([])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

@endsection
