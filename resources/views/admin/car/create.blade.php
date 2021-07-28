@extends('admin.layout')

@section('title', 'Add new car')
@section('active1', 'active')
@section('content-name', 'Thêm mới xe')
@section('content')
    <form method="post" action="{{ route('admin.car.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên xe:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên xe" value="{{ old('name') }}">
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
            <input type="text" id="numberInput" data-a-sign="" data-a-dec="," data-a-sep="." class="form-control" id="price" name="price" placeholder="Nhập giá xe" value="{{ old('price') }}">
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
                        @if(old('brand_id') == $brand->id)
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
            <label for="exampleInputFile">Ảnh:</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image" value="{{ old('image') }}">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
            <textarea class="form-control" id="description" name="description">{{ old('value') }}</textarea>
            @if($errors->has('description'))
                @foreach($errors->get('description') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="d-flex">
            <input type="submit" class="btn btn-success" value="Thêm mới">
            <a href="{{ route('admin.car.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
