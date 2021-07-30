@extends('admin.layout')

@section('title', 'Add new brand')
@section('active2', 'active')
@section('content-name', 'Thêm nhãn hiệu')
@section('content')
    <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên nhãn hiệu:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên nhãn hiệu" value="{{ old('name') }}">
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
            <input type="date" class="form-control" name="founded_date" value="{{ old('founded_date') }}">
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
            <input type="text" class="form-control" name="headquarter" placeholder="Nhập trụ sở" value="{{ old('headquarter') }}">
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
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
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
