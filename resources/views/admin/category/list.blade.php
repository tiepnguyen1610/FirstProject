@extends('admin.master')
@section('pagetitle','Danh sách')
@section('action','danh mục')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th width="80px">ID</th>
            <th align="center" width="120px">Tên Danh Mục</th>
            <th>Giới Thiệu</th>
            <th>Sửa</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            <tr class="even gradeC" align="center">
                <td>{{ $item->id }}</td>
                <td>{!! $item->name !!}</td>
                <td>{!! $item->description !!}</td>
                <td class="center">
                    <a class="btn btn-success btn-sm" href="{{ route('admin.category.edit',$item->id) }}">Chỉnh Sửa</a>
                </td>
                <td class="center">
                    <form action="{{ route('admin.category.destroy',$item->id) }}" method="GET">
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xoá không?')" ><i class="fa fa-trash-o  fa-fw" ></i>Xoá</button>
                    </form>
                </td> 
            </tr>
        @endforeach
    </tbody>
</table>
@endsection