<div class="card-body p-0">
    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Tên nhãn hiệu</th>
            <th>Ảnh</th>
            <th>Ngày thành lập</th>
            <th>Trụ sở</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody id="table-content">
        @foreach($brands as $key => $brand)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $brand->name }}</td>
                <td><img src="{{ asset('storage/'. $brand->image) }}" style="max-width: 100px;"></td>
                <td>{{ $brand->founded_date }}</td>
                <td>{{ $brand->headquarter }}</td>
                <td class="d-flex">
                    <a href="{{ route('brand.show', $brand->id) }}" class="btn-sm btn-info mr-1">Xem</a>
                    <a href="{{ route('brand.edit', $brand->id) }}" class="btn-sm btn-secondary mr-1">Sửa</a>
                    <a href="{{ route('brand.delete', $brand->id) }}" class="btn-sm btn-danger">Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!-- /.card-body -->
<div class="card-footer clearfix">
    <ul class="pagination-sm m-0 float-right">
        {{ $brands->links() }}
    </ul>
</div>
