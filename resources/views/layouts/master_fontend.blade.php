<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BKAP-PHP-LARAVEL</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap&subset=vietnamese" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/fontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/fontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/fontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/fontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/fontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/fontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/fontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/fontend/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/fontend/css/1.css')}}" type="text/css">
    <link rel="stylesheet" href="https://codeseven.github.io/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .header-account.dropdown .custom-menu>li>a>i {
        margin-right: 15px;
        color: #7fad39;
        }

        /*----------------------------*\
            Cart header
        \*----------------------------*/

        .header-cart .header-btns-icon .qty {
        position: absolute;
        right: -9px;
        top: -9px;
        width: 18px;
        height: 18px;
        line-height: 18px;
        text-align: center;
        font-size: 10px;
        background: #7fad39;
        color: #FFF;
        border-radius: 50%;
        }

        .header-cart.dropdown .custom-menu {
        width: 300px;
        }

        #shopping-cart .shopping-cart-list {
        max-height: 260px;
        margin-bottom: 15px;
        overflow-y: scroll;
        }

        #shopping-cart .shopping-cart-list .product.product-widget:first-child {
        margin-top: 0px;
        }

        #shopping-cart .shopping-cart-list .product.product-widget:last-child {
        margin-bottom: 0px;
        }

        #shopping-cart .shopping-cart-btns>button {
        width: calc(50% - 2px);
        }

        /*=========================================================
            03 -> NAVIGATION
        ===========================================================*/

        #navigation {
        background-color: #30323A;
        }

        #navigation .container {
        position: relative;
        }

        /*----------------------------*\
            Category nav
        \*----------------------------*/

        .category-nav {
        float: left;
        width: 270px;
        }

        .category-nav .category-header {
        padding: 15px;
        display: block;
        text-transform: uppercase;
        background: #7fad39;
        color: #FFF;
        font-weight: 700;
        }

        .category-nav .category-header>i {
        float: right;
        line-height: 20px;
        }

        .category-nav .category-list {
        position: absolute;
        width: 270px;
        background-color: #FFF;
        border-left: 1px solid #DADADA;
        border-right: 1px solid #DADADA;
        border-bottom: 1px solid #DADADA;
        z-index: 50;
        -webkit-transition: 0.3s all;
        transition: 0.3s all;
        }

        .category-nav.show-on-click .category-list {
        opacity: 0;
        visibility: hidden;
        -webkit-transform: translate(0px, 15px);
        -ms-transform: translate(0px, 15px);
        transform: translate(0px, 15px);
        }

        .category-nav.show-on-click .category-list.open {
        opacity: 1;
        visibility: visible;
        -webkit-transform: translate(0px, 0px);
        -ms-transform: translate(0px, 0px);
        transform: translate(0px, 0px);
        }

        .category-nav .category-list>li {
        border-top: 1px solid #DADADA;
        }

        .category-nav .category-list>li.dropdown>.itemHover>i {
        float: right;
        line-height: 20px;
        }

        .category-nav .category-list>li>a {
        display: block;
        padding: 15px;
        }
        .category-nav .category-list{
        list-style: none;
        }
        .category-nav .category-list>li>a{
        color: #1c1c1c
        }
        .category-nav .category-list>li>a:hover, .category-nav .category-list>li>a:focus, .category-nav .category-list>li.dropdown.open>a {
        color: #7fad39;
        }

        /*----------------------------*\
            Menu nav
        \*----------------------------*/

        .menu-nav .menu-header {
        display: none;
        padding: 15px;
        text-transform: uppercase;
        background: #30323A;
        color: #FFF;
        font-weight: 700;
        }

        .menu-nav .menu-header>i {
        float: right;
        line-height: 20px;
        }

        .menu-nav .menu-list>li {
        display: inline-block;
        }

        .menu-nav .menu-list>li>a {
        display: block;
        padding: 15px;
        color: #FFF;
        text-transform: uppercase;
        }
        .list-links>li>a {
        color: #1c1c1c;
        }
        .list-links>li {
        list-style: none;
        }
        .menu-nav .menu-list>li>a:hover, .menu-nav .menu-list>li>a:focus, .menu-nav .menu-list>li.dropdown.open>a {
        color: #7fad39;
        }
        .itemHover::after{
            content: none
        }
        /*----------------------------*\
            Dropdowns
        \*----------------------------*/

        .custom-menu {
        position: absolute;
        padding: 15px;
        background: #FFF;
        -webkit-box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.175);
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.175);
        z-index: 100;
        top: 100%;
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: 0.3s all;
        transition: 0.3s all;
        }

        .dropdown.open>.custom-menu {
        opacity: 1;
        visibility: visible;
        }

        /*-- Default Dropdown --*/

        .dropdown.default-dropdown>.custom-menu {
        border-top: 2px solid #7fad39;
        left: 50%;
        -webkit-transform: translateX(-50%) translateY(15px);
        -ms-transform: translateX(-50%) translateY(15px);
        transform: translateX(-50%) translateY(15px);
        }

        .dropdown.default-dropdown.open>.custom-menu {
        -webkit-transform: translateX(-50%) translateY(0px);
        -ms-transform: translateX(-50%) translateY(0px);
        transform: translateX(-50%) translateY(0px);
        }

        .dropdown.default-dropdown>.custom-menu>li>a {
        display: block;
        padding: 10px 0px;
        text-transform: uppercase;
        }

        /*-- Mega Dropdown --*/

        .dropdown.mega-dropdown.full-width {
        position: static !important;
        }

        .dropdown.mega-dropdown>.custom-menu {
        border-top: 2px solid #7fad39;
        left: 0;
        -webkit-transform: translate(0px, 15px);
        -ms-transform: translate(0px, 15px);
        transform: translate(0px, 15px);
        width: auto;
        min-width: 750px;
        max-width: 100%;
        }

        .dropdown.mega-dropdown.full-width>.custom-menu {
        width: 100%;
        }

        .dropdown.mega-dropdown.open>.custom-menu {
        -webkit-transform: translate(0px, 0px);
        -ms-transform: translate(0px, 0px);
        transform: translate(0px, 0px);
        }

        /*-- Side Dropdown --*/

        .dropdown.side-dropdown>.custom-menu {
        border-left: 2px solid #7fad39;
        left: 100%;
        top: 0;
        width: 350px;
        -webkit-transform: translate(15px, 0px);
        -ms-transform: translate(15px, 0px);
        transform: translate(15px, 0px);
        }

        .dropdown.side-dropdown.open>.custom-menu {
        -webkit-transform: translate(0px, 0px);
        -ms-transform: translate(0px, 0px);
        transform: translate(0px, 0px);
        }

    </style>
    {{--Thông báo--}}
    @if (session('toastr'))
        <script>
            var TYPE_MESSAGE="{{ session('toastr.type') }}";
            var MESSAGE="{{ session('toastr.message') }}";
        </script>
    @endif

</head>

<body>

    @yield('css')
    @include('fontend.components.header')
    @yield('content')

    @include('fontend.components.footer')
    @yield('script')

    <!-- Js Plugins -->

    <script src="{{asset('public/fontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/bootstrap.min1.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('public/fontend/js/mixitup.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
    <script>
        if (typeof TYPE_MESSAGE!="undefined") {
            switch (TYPE_MESSAGE) {
                case 'success':
                    toastr.success(MESSAGE);
                    break;
                case 'error':
                    toastr.error(MESSAGE);
                    break;
                default:
                    break;
            }
        }

        $(".js-show-login").click(function(event){
            event.preventDefault();
            toastr.warning("Bạn phải đăng nhập để thực hiện chức năng này");
            return false;
        })
        // NAVIGATION
        var responsiveNav =$('#responsive-nav'),
            catToggle = $('#responsive-nav .category-nav .category-header'),
            catList = $('#responsive-nav .category-nav .category-list'),
            menuToggle = $('#responsive-nav .menu-nav .menu-header'),
            menuList = $('#responsive-nav .menu-nav .menu-list');


        catToggle.on('click', function() {
            menuList.removeClass('open');
            catList.toggleClass('open');
        });

        menuToggle.on('click', function() {
            catList.removeClass('open');
            menuList.toggleClass('open');
        });


        $(document).ready(function(){
            $(".aaaa").mouseover(function(){
                $(this).addClass("open");
            });
            $(".aaaa").mouseout(function(){
            $(this).removeClass("open");
            });
        });

        var inputUpdate=$(".inputUpdate")
        var lableUpdate=$(".lableUpdate")
        $(".js-updateInfo").click(function(event){
            event.preventDefault();
            inputUpdate.show();
            lableUpdate.hide();
        })

    </script>
     <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
                var action = $(this).attr('id');

                var ma_id = $(this).val();
                var result = '';

                if(action=='city'){
                    result = 'district';
                }else{
                    result = 'ward';
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : '{{url('/select-delivery-home')}}',
                    method: 'POST',
                    data:{action:action,ma_id:ma_id},
                    success:function(data){

                        $('#'+result).html(data);

                    }
                })
            });
        });

    </script>
</body>

</html>
