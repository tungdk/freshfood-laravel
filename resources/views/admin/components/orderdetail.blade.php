<table class="table table-condensed">
    <tbody>
        <tr>
            <th style="width: 10px">#</th>
            <th>Tên sản phẩm</th>
            <th>Avatar</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>

        </tr>
        @foreach ($orderDetail as $item)
        <tr>
                <td>{{$item->id}}.</td>
                <td>{{$item->product->name}}</td>
                <td>
                    <img src="{{url('/')}}/public/uploads/brand/{{$item->product->picture}}" alt="" style="width: 80px;height: 80px;">
                </td>
                <td>{{ number_format($item->price,0,',','.')}} vnđ</td>
                <td>{{$item->qty}}</td>
                <td>{{ number_format($item->price*$item->qty,0,',','.')}} vnđ</td>
                <td>
                    <a href="{{ route('ajax.admin.order.order_detail_delete',$item->id) }}" class="btn btn-xs btn-danger js-delete-order-detail"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>

