@extends('layout')

@section('title', 'Car Information')
@section('content-name', 'Thông tin xe')
@section('content')
    <h3>{{ $car->car_name }}</h3>
    <p>Giá: {{ $car->price }}</p>
    <p>{{ $car->description }}</p>
    @if($car->image_url)
        <img src="{{ asset('storage/'.$car->image_url) }}" alt="" style="max-height: 200px">
    @else
        {{'Chưa có ảnh'}}
    @endif
@endsection
