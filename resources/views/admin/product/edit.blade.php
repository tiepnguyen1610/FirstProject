@extends('admin.master')
@section('pagetitle','Product')
@section('action','Edit')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Danh Mục</label>
                    <select class="form-control" name="slrCategory" >
                        <option value="">Mời chọn danh mục chính</option>
                       {{--  @foreach($cat_id as $category)
                        <option value="{{ $category->id }} ">{{$category->name }}</option>
                        @endforeach --}}
                    </select>
                {{-- @error('slrCategory')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}
            </div>
            <div class="form-group">
                <label>Tên sản phẩm:</label>
                <input type="text" class="form-control" name="txtProName" placeholder="" />
            </div>
            <div class="form-group">
                <label>Giá tiền:</label>
                <input type="number" class="form-control" name="txtUnitPrice" placeholder="" />
            </div>
            <div class="form-group">
                <label>Giá ưu đãi:</label>
                <input type="number" class="form-control" name="txtProPrice" placeholder="" />
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImage">
            </div>
            <div class="form-group">
                <label>Giới thiệu:</label>
                <textarea class="form-control" rows="5" name="txtDescription"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Product Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
    </div>
@endsection