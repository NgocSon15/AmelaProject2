@extends('admin.layout')

@section('title')
    Order List
@endsection
@section('active3', 'active')
@section('content-name')
    Order List
@endsection
@section('content')
    <div class="col-12">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
    <div class="d-flex">
        <div class="d-flex ml-auto">
            <a href="{{ route('car.create') }}" class="btn btn-success mb-3 ml-1">
                {{ __('language.add') }}
            </a>
        </div>
    </div>
    <div class="card" style="margin: 0" id="table_data">
        @include('admin.order.listContent')
    </div>
@endsection
@section('customScript')
    <script>
        $(document).ready(function()
        {
            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    'url': '{{ route('order.fetch_data') }}?page=' + page,
                    success:function (orders)
                    {
                        $('#table_data').html(orders);
                        $('.number_output').each(function () {
                            var value = $(this).html();
                            value = Intl.NumberFormat().format(value);
                            $(this).html(value);
                        })
                    }
                })
            }
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.number_output').each(function () {
                var value = $(this).html();
                value = Intl.NumberFormat().format(value);
                $(this).html(value);
            })
        })
    </script>
@endsection
