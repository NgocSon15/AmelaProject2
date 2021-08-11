@extends('admin.layout')

@section('title', 'Order Detail')
@section('active3', 'active')
@section('content-name', 'Chi tiết đơn hàng')
@section('content')
    <p>Mã đơn hàng: {{ $order->id }}</p>
    <p>Khách hàng: {{ $order->user->name }}</p>
    <p>Mã khách hàng: {{ $order->user->id }}</p>
    <p>Tổng giá trị: <span class="number_output">{{ $order->totalPrice }}</span></p>
    <p>Ngày đặt hàng: {{ $order->orderDate }}</p>

    <p>Danh sách sản phẩm:</p>
    <div class="card" style="margin: 0" id="table_data">
        @include('admin.order.detailList')
    </div>

    <div class="d-flex">
        <a href="{{ route('order.index') }}" class="btn btn-default">Quay lại</a>
    </div>
@endsection
