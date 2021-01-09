@extends('admin.master')
@section('pagetitle','Cập nhật')
@section('action','danh mục')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route('admin.category.update', $category['id']) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên danh mục:</label>
                <input class="form-control" value="{!! old('txtCatName', $category['name']) !!}" name="txtCatName" placeholder="Nhập tên danh mục.." />
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <textarea class="form-control" name="txtDescription" rows="5">{!! old('txtDescription', $category['description']) !!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <button type="reset" class="btn btn-default">Đặt Lại</button>
        <form>
    </div>
@endsection