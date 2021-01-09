@extends('admin.master')
@section('pagetitle','Thêm mới')
@section('action','Slide')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route('admin.slide.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên Slide:</label>
                <input class="form-control" name="txtSlideName" placeholder="Mời nhập tên Slide..." />
                @error('txtSlideName')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Ảnh:</label>
                <input type="file" name="slide">
                @error('slide')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm Mới</button>
            <button type="reset" class="btn btn-default">Đặt Lại</button>
        <form>
    </div>
@endsection