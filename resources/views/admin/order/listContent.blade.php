<div class="card-body p-0">
    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Tên khách hàng</th>
            <th>Tổng giá trị</th>
            <th>Ngày đặt hàng</th>
            <th>{{ __('language.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $order)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $order->user->name }}</td>
                <td class="number_output">{{ $order->totalPrice }}</td>
                <td>{{ $order->orderDate }}</td>
                <td class="d-flex">
                    <a href="{{ route('order.show', $order->id) }}" class="btn-sm btn-info mr-1">Chi tiết</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        {{ $orders->links() }}
    </ul>
</div>
