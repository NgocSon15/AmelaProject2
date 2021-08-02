<!DOCTYPE html>
@extends('admin.layout')

@section('title', 'Edit car information')
@section('active1', 'active')
@section('content-name', 'Sửa thông tin xe')
@section('content')
    <div style="padding-bottom: 16px">
        <h3>{{ $car->name }}</h3>
        <form method="post" action="{{ route('car.update', $car->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Tên xe:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên xe" value="{{ $car->name }}">
                @if($errors->has('name'))
                    @foreach($errors->get('name') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="text" class="number-input form-control" id="price" name="price" placeholder="Nhập giá xe" value="{{ $car->price }}">
                @if($errors->has('price'))
                    @foreach($errors->get('price') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="brand_id">Nhãn hiệu:</label>
                <select class="form-control" name="brand_id">
                    <option value="" selected disabled hidden>-- Chọn nhãn hiệu xe --</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                        @if($car->brand_id == $brand->id)
                            {{ 'selected' }}
                            @endif
                        >
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('brand_id'))
                    @foreach($errors->get('brand_id') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="car_model_id">Kiểu dáng:</label>
                <select class="form-control" name="car_model_id">
                    <option value="" selected disabled hidden>-- Chọn dòng xe --</option>
                    @foreach($carModels as $carModel)
                        <option value="{{ $carModel->id }}"
                        @if($car->carmodel_id == $carModel->id)
                            {{ 'selected' }}
                            @endif
                        >
                            {{ $carModel->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('car_model_id'))
                    @foreach($errors->get('car_model_id') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="fuel">Nhiên liệu:</label>
                <select class="form-control" name="fuel">
                    <option value="" selected disabled hidden>-- Chọn loại nhiên liệu --</option>
                    <option value="Xăng"
                    @if($car->fuel == 'Xăng')
                        {{ 'selected' }}
                        @endif
                    >
                        Xăng
                    </option>
                    <option value="Điện"
                    @if($car->fuel == 'Điện')
                        {{ 'selected' }}
                        @endif
                    >
                        Điện
                    </option>
                </select>
                @if($errors->has('fuel'))
                    @foreach($errors->get('fuel') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="gearbox">Hộp số:</label>
                <select class="form-control" name="gearbox">
                    <option value="" selected disabled hidden>-- Chọn loại hộp số --</option>
                    <option value="Tự động"
                    @if($car->gearbox == 'Tự động')
                        {{ 'selected' }}
                        @endif
                    >
                        Tự động
                    </option>
                    <option value="Số sàn"
                    @if($car->gearbox == 'Số sàn')
                        {{ 'selected' }}
                        @endif
                    >
                        Số sàn
                    </option>
                </select>
                @if($errors->has('gearbox'))
                    @foreach($errors->get('gearbox') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="origin">Xuất xứ:</label>
                <select class="form-control" name="origin">
                    <option value="" selected disabled hidden>-- Chọn xuất xứ --</option>
                    <option value="Nhập khẩu"
                    @if($car->origin == 'Nhập khẩu')
                        {{ 'selected' }}
                        @endif
                    >
                        Nhập khẩu
                    </option>
                    <option value="Sản xuất trong nước"
                    @if($car->origin == 'Sản xuất trong nước')
                        {{ 'selected' }}
                        @endif
                    >
                        Sản xuất trong nước
                    </option>
                </select>
                @if($errors->has('origin'))
                    @foreach($errors->get('origin') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="color">Màu sắc:</label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Nhập màu xe" value="{{ $car->color  }}">
                @if($errors->has('color'))
                    @foreach($errors->get('color') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="manufactured_date">Ngày sản xuất:</label>
                <input type="date" class="form-control" name="manufactured_date" value="{{ $car->manufactured_date }}">
                @if($errors->has('manufactured_date'))
                    @foreach($errors->get('manufactured_date') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="engine_capacity">Dung tích động cơ:</label>
                <input type="text" class="form-control" name="engine_capacity" value="{{ $car->engine_capacity }}">
                @if($errors->has('engine_capacity'))
                    @foreach($errors->get('engine_capacity') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="seat_number">Số ghế:</label>
                <input type="text" class="form-control" name="seat_number" value="{{ $car->seat_number }}">
                @if($errors->has('seat_number'))
                    @foreach($errors->get('seat_number') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="door_number">Số cửa:</label>
                <input type="text" class="form-control" name="door_number" value="{{ $car->door_number }}">
                @if($errors->has('door_number'))
                    @foreach($errors->get('door_number') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng:</label>
                <input type="text" class="number-input form-control"  name="quantity" value="{{ $car->quantity }}">
                @if($errors->has('quantity'))
                    @foreach($errors->get('quantity') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Ảnh:</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image" value="{{ $car->image }}">
                        <label class="custom-file-label" for="exampleInputFile">{{ $car->image }}</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @if($errors->has('image'))
                    @foreach($errors->get('image') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" id="description" name="description">{{ $car->description }}</textarea>
                @if($errors->has('description'))
                    @foreach($errors->get('description') as $message)
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="d-flex">
                <input type="submit" class="btn btn-success" value="Cập nhật">
                <a href="{{ route('car.index') }}" class="btn btn-default ml-2">Huỷ</a>
            </div>
        </form>
    </div>

@endsection
@section('customScript')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        $('.number-input').each(function() {
            var value = $(this).val();
            value = Intl.NumberFormat().format(value);
            $(this).val(value);
        })

        $('.number-input').on('keyup', function () {
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString())
        })
    </script>
@endsection
