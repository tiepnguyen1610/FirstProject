@extends('admin.master')
@section('pagetitle','Danh sách')
@section('action','Slide')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Tên Slide</th>
            <th>Ảnh Slide</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach($data as $item)
            <tr class="even gradeC" align="center">
                <td>{{ $i++ }}</td>
                <td>{!! $item['name'] !!}</td>
                <td>
                    <img src="{{ asset('public/uploads/'.$item['image']) }}" width="100px" height="80px" alt="fwfgwuy">
                </td>   
                <td>
                    <a class="btn btn-success btn-sm" href="#">Chỉnh Sửa</a>
                </td>
                <td>
                    <form action="{{ route('admin.slide.destroy', $item["id"]) }}" method="GET">
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xoá không?')" ><i class="fa fa-trash-o  fa-fw" ></i>Xoá</button>
                    </form>
                </td> 
            </tr>
        @endforeach
    </tbody>
</table>
@endsection