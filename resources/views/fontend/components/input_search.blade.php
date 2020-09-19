<div class="hero__search__form">
    <form action="{{route('get.product.list')}}" method="GET">
        <input type="text" placeholder="Nhập sản phẩm cần tìm kiếm?" value="{{ Request::get('name')}}" name="name" >
        <button type="submit" class="site-btn">Tìm Kiếm</button>
    </form>
</div>
