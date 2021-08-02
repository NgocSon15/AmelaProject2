@extends('admin.layout')

@section('title', 'Delete car')
@section('active1', 'active')
@section('content-name', 'Xóa xe')
@section('content')
    <p>Bạn có muốn xóa xe {{ $car->name }}?</p>
    <form method="post" action="{{ route('car.destroy', $car->id) }}">
        @csrf
        <div class="d-flex">
            <input type="submit" class="btn btn-danger" value="Xoá">
            <a href="{{ route('car.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection
