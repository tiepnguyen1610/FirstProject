@extends('admin.master')
@section('pagetitle','Cập nhật')
@section('action','Slide')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="" method="POST">
            <div class="form-group">
                <label>Tên Slide:</label>
                <input class="form-control" name="txtSlideName" placeholder="Please Enter Category Name" />
            </div>
            <div class="form-group">
                <label>Ảnh:</label>
                <input type="file" name="fimage">
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <button type="reset" class="btn btn-default">Đặt Lại</button>
        <form>
    </div>
@endsection