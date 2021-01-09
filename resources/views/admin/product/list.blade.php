@extends('admin.master')
@section('pagetitle','Product')
@section('action','List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Ảnh</th>
            <th>Thời gian</th>
            <th>Sửa</th>
            <th>Xoá</th>
        </tr>
    </thead>
        <tbody>
            @foreach($products as $product)
                <tr class="odd gradeX" align="center">
                    <td>{{ $product->id }}</td>
                    <td>{!! $product->name !!}</td>
                    <td>{!! $product->category->name !!}</td>
                    <td>{!! number_format($product->unitprice,0,",",".") !!}₫</td>
                    <td>
                        <img width="40px" height="40px" src="{{ asset('storage/app') . '/' . $product->image }}" alt="">
                    </td>
                    <td>{!! $product->created_at->diffForHumans() !!}</td>
                    <td class="center">
                        <a class="btn btn-success btn-sm" href="">Chỉnh Sửa</a>
                    </td>
                    <td class="center">
                        <form action="{{ route('admin.product.destroy',$product->id) }}" method="GET">
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xoá không?')" ><i class="fa fa-trash-o  fa-fw" ></i>Xoá</button>
                        </form>
                    </td> 
                </tr>
                @endforeach
        </tbody>
</table>
@endsection
