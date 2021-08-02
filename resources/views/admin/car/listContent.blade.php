<div class="card-body p-0">
    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Tên xe</th>
            <th>Giá thành</th>
            <th>Nhãn hiệu</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $key => $car)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $car->name }}</td>
                <td class="number_output">{{ $car->price }}</td>
                <td>{{ $car->brand->name }}</td>
                <td><img src="{{ asset('storage/'. $car->image) }}" style="max-width: 100px"></td>
                <td class="number_output">{{ $car->quantity }}</td>
                <td class="d-flex">
                    <a href="{{ route('car.show', $car->id) }}" class="btn-sm btn-info mr-1">Xem</a>
                    <a href="{{ route('car.edit', $car->id) }}" class="btn-sm btn-secondary mr-1">Sửa</a>
                    <a href="{{ route('car.delete', $car->id) }}" class="btn-sm btn-danger">Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        {{ $cars->links() }}
    </ul>
</div>
