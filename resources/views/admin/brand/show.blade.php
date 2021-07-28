@extends('admin.layout')

@section('title', 'Brand Information')
@section('active2', 'active')
@section('content-name', 'Thông tin nhãn hiệu')
@section('content')
    <h3>{{ $brand->name }}</h3>
@endsection
