@extends('layout')

@section('title', 'Car List')
@section('content-name', 'Danh sách xe')
@section('content')
    <div class="col-12">
        @if (Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{ Session::get('success') }}
            </p>
        @endif
    </div>
    <a href="{{ route('car.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Thêm mới</a>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Tên xe</th>
                    <th>Giá thành</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $key => $car)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $car->car_name }}</td>
                        <td>{{ $car->price }}</td>
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
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
@endsection

