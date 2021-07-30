@extends('admin.layout')

@section('title', 'Sửa nhãn hiệu')
@section('active2', 'active')
@section('content-name', 'Sửa thông tin nhãn hiệu')
@section('content')
<form method="post" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Tên nhãn hiệu:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên nhãn hiệu" value="{{ $brand->name }}">
        @if($errors->has('name'))
            @foreach($errors->get('name') as $message)
                <p class="text-danger">
                    {{ $message }}
                </p>
            @endforeach
        @endif
    </div>
    <div class="form-group">
        <label for="founded_date">Ngày thành lập:</label>
        <input type="date" class="form-control" name="founded_date" value="{{ $brand->founded_date }}">
        @if($errors->has('founded_date'))
            @foreach($errors->get('founded_date') as $message)
                <p class="text-danger">
                    {{ $message }}
                </p>
            @endforeach
        @endif
    </div>
    <div class="form-group">
        <label for="headquarter">Trụ sở:</label>
        <input type="text" class="form-control" name="headquarter" placeholder="Nhập trụ sở" value="{{ $brand->headquarter }}">
        @if($errors->has('headquarter'))
            @foreach($errors->get('headquarter') as $message)
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
                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" value="{{ $brand->image }}">
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
        <textarea class="form-control" id="description" name="description">{{ $brand->description }}</textarea>
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
        <a href="{{ route('brand.index') }}" class="btn btn-default ml-2">Huỷ</a>
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
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

