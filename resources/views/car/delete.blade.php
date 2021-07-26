@extends('layout')

@section('title', 'Delete car')
@section('content-name', 'Xóa xe')
@section('content')
    <p>Bạn có muốn xóa xe {{ $car->car_name }}?</p>
    <form method="post" action="{{ route('car.destroy', $car->id) }}">
        @csrf
        <div class="d-flex">
            <input type="submit" class="btn btn-danger" value="Xoá">
            <a href="{{ route('car.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection
