{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--        <title>Log in</title>--}}
{{--        <!-- Tell the browser to be responsive to screen width -->--}}
{{--        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">--}}
{{--        <!-- Bootstrap 3.3.7 -->--}}
{{--        <link rel="stylesheet" href="{{asset('public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">--}}
{{--        <!-- Font Awesome -->--}}
{{--        <link rel="stylesheet" href="{{asset('public/backend/bower_components/font-awesome/css/font-awesome.min.css')}}">--}}
{{--        <!-- Ionicons -->--}}
{{--        <link rel="stylesheet" href="{{asset('public/backend/bower_components/Ionicons/css/ionicons.min.css')}}">--}}
{{--        <!-- Theme style -->--}}
{{--        <link rel="stylesheet" href="{{asset('public/backend/dist/css/AdminLTE.min.css')}}">--}}
{{--        <!-- iCheck -->--}}
{{--        <link rel="stylesheet" href="{{asset('public/backend/plugins/iCheck/square/blue.css')}}">--}}
{{--        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->--}}
{{--        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->--}}
{{--        <!--[if lt IE 9]>--}}
{{--        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>--}}
{{--        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
{{--        <![endif]-->--}}
{{--        <!-- Google Font -->--}}
{{--        <link rel="stylesheet" href="https://codeseven.github.io/toastr/build/toastr.min.css">--}}
{{--        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">--}}
{{--        @if (session('toastr'))--}}
{{--            <script>--}}
{{--                var TYPE_MESSAGE="{{ session('toastr.type') }}";--}}
{{--                var MESSAGE="{{ session('toastr.message') }}";--}}
{{--            </script>--}}
{{--        @endif--}}

{{--    </head>--}}
{{--    <body class="hold-transition login-page">--}}
{{--        <div class="login-box">--}}
{{--            <div class="login-logo">--}}
{{--                <a href="/">Login hệ thông Admin</a>--}}
{{--            </div>--}}
{{--            <!-- /.login-logo -->--}}
{{--            <div class="login-box-body">--}}
{{--                <p class="login-box-msg">Sign in to start your session</p>--}}
{{--                <form action="" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group has-feedback">--}}
{{--                        <input type="email" name="email" class="form-control" placeholder="Email">--}}
{{--                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
{{--                    </div>--}}
{{--                    <div class="form-group has-feedback">--}}
{{--                        <input type="password" name="password" class="form-control" placeholder="Password">--}}
{{--                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}

{{--                        <div class="col-xs-4">--}}
{{--                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>--}}
{{--                        </div>--}}
{{--                        <!-- /.col -->--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                <!-- /.social-auth-links -->--}}
{{--            </div>--}}
{{--            <!-- /.login-box-body -->--}}
{{--        </div>--}}
{{--        <!-- /.login-box -->--}}
{{--        <!-- jQuery 3 -->--}}
{{--        <script src="{{asset('public/backend/bower_components/jquery/dist/jquery.min.js')}}"></script>--}}
{{--        <!-- Bootstrap 3.3.7 -->--}}
{{--        <script src="{{asset('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>--}}
{{--        <!-- iCheck -->--}}
{{--        <script src="{{asset('public/backend/plugins/iCheck/icheck.min.js')}}"></script>--}}
{{--        <script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>--}}
{{--        <script>--}}
{{--            if (typeof TYPE_MESSAGE!="undefined") {--}}
{{--                switch (TYPE_MESSAGE) {--}}
{{--                    case 'success':--}}
{{--                        toastr.success(MESSAGE);--}}
{{--                        break;--}}
{{--                    case 'error':--}}
{{--                        toastr.error(MESSAGE);--}}
{{--                        break;--}}
{{--                    default:--}}
{{--                        break;--}}
{{--                }--}}
{{--            }--}}
{{--        </script>--}}
{{--    </body>--}}
{{--</html>--}}
