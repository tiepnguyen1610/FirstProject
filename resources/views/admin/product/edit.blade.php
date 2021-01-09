@extends('admin.master')
@section('pagetitle','Product')
@section('action','Edit')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route('admin.product.update', $product['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Danh Mục</label>
                    <select class="form-control" name="slrCategory" >
                        <option value="">Mời chọn danh mục chính</option>
                        @foreach($category as $cat_id)
                        <option value="{{ $cat_id->id }}" 
                            {{ ($product->cat_id == $cat_id->id)?'selected':'' }}
                        >{{ $cat_id->name }}
                        </option>
                        @endforeach
                    </select>
                @error('slrCategory')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tên sản phẩm:</label>
                <input type="text" class="form-control" value="{{ old('txtProName', $product['name']) }}" name="txtProName" placeholder="" />
            </div>
            <div class="form-group">
                <label>Giá tiền:</label>
                <input type="number" class="form-control" value="{{ old('txtUnitPrice', $product['unitprice']) }}" name="txtUnitPrice" placeholder="" />
            </div>
            <div class="form-group">
                <label>Giá ưu đãi:</label>
                <input type="number" class="form-control" value="{{ old('txtProPrice', $product['promotionprice']) }}" name="txtProPrice" placeholder="" />
            </div>
            <div class="form-group">
                <label>Ảnh:</label>
                <input type="file" name="fImage">
                <img src="{{ asset('public/uploads/images/'.$product['image']) }}" id="myImage" width="184px" alt="">
            </div>
            <div class="form-group">
                <label>Giới thiệu:</label>
                <textarea class="form-control" rows="5" name="txtDescription">{{ old('txtDescription', $product['description']) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
    </div>
    {{-- <script>
        var imageClick = document.querySelector('#myImage');
        var showInput = document.querySelector('#myfile');
            imageClick.onclick = function(){
                this.append('<div class="form-group"><input type="file" name="fImage"></div>');
            }
    </script> --}}
@endsection