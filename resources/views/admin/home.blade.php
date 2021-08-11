@extends('admin.layout')

@section('title')
    {{ __('language.home') }}
@endsection
@section('content-name')
    @if(Session::has('user'))
        {{ __('language.welcome') }} {{ Session::get('user')->name }}
    @else
        {{ __('language.welcome') }}
    @endif
@endsection
@section('content')
@endsection
