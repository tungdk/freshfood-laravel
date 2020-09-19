
<div class="list-group menu_item">
    @if (Auth::check())
    <a href="{{ route('get.user.update_info') }}" class="list-group-item" style="color: black"><i class="fa fa-user" aria-hidden="true"></i> Thông tin tài khoản</a>
    @else
        <a href="{{ route('login') }}" class="list-group-item" style="color: black"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a>
        <a href="{{ route('register') }}" class="list-group-item" style="color: black"><i class="fa fa-registered" aria-hidden="true"></i> Đăng ký</a>
    @endif


    {{-- <a href="{{ route('get.login') }}" class="list-group-item" style="color: black"><i class="fa fa-refresh" aria-hidden="true"></i> Quên tài khoản</a>
    <a href="{{ route('get.login') }}" class="list-group-item" style="color: black"><i class="fa fa-address-card-o" aria-hidden="true"></i> Sổ tay địa chỉ</a> --}}
    <a href="{{ route('get.user.favourite') }}" class="list-group-item" style="color: black"><i class="fa fa-heart" aria-hidden="true"></i> Danh sách yêu thích</a>
    <a href="{{ route('get.user.order_info') }}" class="list-group-item" style="color: black"><i class="fa fa-list-alt" aria-hidden="true"></i> Lịch sử đặt hàng</a>
</div>
