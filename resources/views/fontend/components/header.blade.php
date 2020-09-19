  <!-- Header Section Begin -->
  <header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> thienlamdth23031997@gmail.com   </li>
                            <li><i class="fa fa-phone"> 0353260372</i></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                           @if (Auth::check())
                               xin chào {{Auth::user()->name}}
                           @endif
                        </div>
                        @if (Auth::check())
                        <div class="header__top__right__social">
{{--                            <a href="{{ route('logout') }}"><i class="fa fa-sign-out"> Đăng xuất</i></a>--}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="{{ route('get.user.update_info') }}"><i class="fa fa-user"> Thông tin</i></a>
                        </div>
                            @if(Auth::User()->role==1)
                                <div class="header__top__right__auth">

                                    <button class="btn btn-success"><a href="{{ route('admin.statistical') }}"><i class="fa fa-user"></i> Quản trị</a></button>

                                </div>
                            @endif
                        @else
                        <div class="header__top__right__social">
                            <a href="{{ route('get.register') }}"><i class="fa fa-sign-out"> Đăng ký</i></a>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{asset('public/fontend/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('home')}}">Trang chủ</a></li>
                        <li><a href="">Giảm giá</a></li>
                        <li><a href="{{ route('get.blog.home')}}">Bài Viết</a></li>
                        <li><a href="">Giới Thiệu</a></li>

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{ route('get.user.favourite') }}"><i class="fa fa-heart"></i>
                            <span>
                                @if (isset($favourite))

                                        {{ $favourite }}

                                    @else
                                        0
                                    @endif

                            </span>
                        </a></li>
                        <li><a href="{{ route('get.shopping.list') }}"><i class="fa fa-cart-plus"></i>
                            <span>
                                @if (Cart::count()!=0)
                                    {{ Cart::count() }}
                                @else
                                    0
                                @endif

                            </span>
                        </a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>
                         @if (Cart::count()!=0)
                            {{ Cart::subtotal(0) }}
                        @else
                            0
                        @endif
                        vnđ</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
