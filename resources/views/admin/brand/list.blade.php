@extends('admin.layout')

@section('title', 'Brand List')
@section('active2', 'active')
@section('content-name', 'Danh sách nhãn hiệu')
@section('content')
    <div class="col-12">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
    <a href="{{ route('brand.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Thêm mới</a>
    <div class="card" id="table_data">
        @include('admin.brand.listContent')
        <!-- /.card-body -->
    </div>
@endsection
@section('customScript')
<!-- Phân trang -->
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
                'url': '{{ route('brand.fetch_data') }}?page=' + page,
                success:function (brand)
                {
                    $('#table_data').html(brand);
                }
            })
        }
    })
</script>
@endsection

