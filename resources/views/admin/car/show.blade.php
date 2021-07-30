@extends('admin.layout')

@section('title', 'Car Information')
@section('active1', 'active')
@section('content-name', 'Thông tin xe')
@section('content')
    <h3>{{ $car->name }}</h3>
    <p>Giá: {{ $car->price }}</p>
    <p>Nhãn hiệu: {{ $car->brand->name }}</p>

    @if($car->carModel)
        <p>Kiểu dáng: {{ $car->carModel->name }}</p>
    @else
        <p>Kiểu dáng:</p>
    @endif
    <p>Nhiên liệu sử dung: {{ $car->fuel }}</p>
    <p>Hộp số: {{ $car->gearbox }}</p>
    <p>Xuất xứ: {{ $car->origin }}</p>
    <p>Màu sắc: {{ $car->color }}</p>
    <p>Dung tích động cơ: {{ $car->engine_capacity }}L</p>
    <p>Số ghế: {{ $car->seat_number }}</p>
    <p>Số cửa: {{ $car->door_number }}</p>
    <p>Số lượng xe: {{ $car->quantity }}</p>
    <p>Ngày sản xuất: {{ $car->manufactured_date }}</p>
    <p>Mô tả: {{ $car->description }}</p>

    @if($car->image)
        <img src="{{ asset('storage/'.$car->image) }}" alt="" style="max-height: 200px">
    @else
        {{'Chưa có ảnh'}}
    @endif

    <div class="d-flex">
        <a href="{{ route('car.edit', $car->id) }}" class="btn btn-secondary">Sửa</a>
        <a href="{{ route('car.delete', $car->id) }}" class="btn btn-danger ml-2">Xóa</a>
        <a href="{{ route('car.index') }}" class="btn btn-default ml-2">Quay lại</a>
    </div>
@endsection
