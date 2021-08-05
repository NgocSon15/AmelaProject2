@extends('admin.layout')

@section('title')
    {{ __('language.carList') }}
@endsection
@section('active1', 'active')
@section('content-name')
    {{ __('language.carList') }}
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
        <form class="navbar-form navbar-left" action="{{ route('car.search') }}">
            @csrf
            <div class="d-flex">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="{{ __('language.search') }}" name="keyword"
                        @if(isset($keyword))
                            value="{{$keyword}}"
                        @endif
                    >
                </div>
                <button type="submit" class="btn btn-primary mb-3 ml-1">{{ __('language.search') }}</button>
            </div>
        </form>
        <div class="d-flex ml-auto">
            <a class="btn btn-primary mb-3" href="" data-toggle="modal" data-target="#brandModal">
                {{ __('language.filter') }}
            </a>
            <a href="{{ route('car.create') }}" class="btn btn-success mb-3 ml-1">
                {{ __('language.add') }}
            </a>
        </div>
    </div>
    <div class="card" style="margin: 0" id="table_data">
        @include('admin.car.listContent')

        <div class="modal fade" id="brandModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <form action="{{ route('car.filterByBrand') }}" method="get">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <!--Lọc theo khóa học -->
                            <div class="select-by-program">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label border-right">Lọc xe theo nhãn hiệu:</label>
                                    <div class="col-sm-7">
                                        <select class="custom-select w-100" name="brand_id">
                                            <option value="" hidden disabled selected>Chọn nhãn hiệu</option>
                                            @foreach($brands as $brand)
                                                @if(isset($brandFilter))
                                                    @if($brand->id == $brandFilter->id)
                                                        <option value="{{$brand->id}}"
                                                                selected>{{ $brand->name }}</option>
                                                    @else
                                                        <option value="{{$brand->id}}">{{ $brand->name }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{$brand->id}}">{{ $brand->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- </form> -->
                            </div>
                            <!--End-->

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
                    //'url': '/car/fetch_data?page=' + page,
                    'url': '{{ route('car.fetch_data') }}?page=' + page,
                    success:function (brand)
                    {
                        $('#table_data').html(brand);
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

