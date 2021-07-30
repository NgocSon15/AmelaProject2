@extends('admin.layout')

@section('title', 'Brand Information')
@section('active2', 'active')
@section('content-name', 'Thông tin nhãn hiệu')
@section('content')
    <h3>{{ $brand->name }}</h3>
    <p>Ngày thành lập: {{ $brand->founded_date }}</p>
    <p>Trụ sở chính: {{ $brand->headquarter }}</p>
    <p>Mô tả: {{ $brand->description }}</p>

    @if($brand->image)
        <img src="{{ asset('storage/'.$brand->image) }}" alt="" style="max-height: 200px">
    @else
        {{'Chưa có ảnh'}}
    @endif

    <div class="d-flex">
        <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-secondary">Sửa</a>
        <a href="{{ route('brand.delete', $brand->id) }}" class="btn btn-danger ml-2">Xóa</a>
        <a href="{{ route('brand.index') }}" class="btn btn-default ml-2">Quay lại</a>
    </div>
@endsection
