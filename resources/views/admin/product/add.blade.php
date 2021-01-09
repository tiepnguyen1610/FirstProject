@extends('admin.master')
@section('pagetitle','Thêm mới')
@section('action','Sản phẩm')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="slrCategory" >
                    <option value="">Mời chọn danh mục</option>
                    @foreach($category as $cat_id)
                        <option value="{{ $cat_id->id }} "> -- {{ $cat_id->name }}</option>
                    @endforeach
                </select>
                @error('slrCategory')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tên sản phẩm:</label>
                <input type="text" class="form-control" name="txtProName" placeholder="" />
                @error('txtProName')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Giá tiền:</label>
                <input type="number" class="form-control" name="txtUnitPrice" placeholder="" />
                @error('txtUnitPrice')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Giá ưu đãi:</label>
                <input type="number" class="form-control" name="txtProPrice" placeholder="" />
            </div>
            <div class="form-group">
                <label>Ảnh:</label>
                <input type="file" name="fImage">
                @error('fImage')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Giới thiệu:</label>
                <textarea class="form-control" rows="5" name="txtDescription"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <button type="reset" class="btn btn-default">Đặt Lại</button>
        <form>
    </div>
@endsection


{{-- <div class="form-group">
    <label>Product Status</label>
    <label class="radio-inline">
        <input name="rdoStatus" value="1" checked="" type="radio">Visible
    </label>
    <label class="radio-inline">
        <input name="rdoStatus" value="2" type="radio">Invisible
    </label>
</div> --}}