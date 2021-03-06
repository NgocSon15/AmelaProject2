@extends('admin.layout')

@section('title', 'Delete brand')
@section('active2', 'active')
@section('content-name', 'Xóa nhãn hiệu')
@section('content')
    <p>Bạn có muốn xóa nhãn hiệu {{ $brand->name }}?</p>
    <form method="post" action="{{ route('brand.destroy', $brand->id) }}">
        @csrf
        <div class="d-flex">
            <input type="submit" class="btn btn-danger" value="Xoá">
            <a href="{{ route('brand.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection
