@extends('admin.master')
@section('pagetitle','Thêm mới')
@section('action','danh mục')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên danh mục:</label>
                <input class="form-control" name="txtCatName" placeholder="Nhập tên danh mục.." />
                @error('txtCatName')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <textarea class="form-control" name="txtDescription" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Mới</button>
            <button type="reset" class="btn btn-default">Đặt Lại</button>
        <form>
    </div>
@endsection