<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Cate\CateRequest;

class CategoryController extends Controller
{

	public function index()
    {
    	/**
    	 * Lấy dữ liệu từ database đổ ra danh sách danh mục sản phẩm
    	 */
    	$data = CategoryRepository::list(['id', 'name', 'description']);
    	return view('admin.category.list',compact('data'));
    }

	/**
	 * Show the form for creating category
	 * @return [type] [description]
	 */
    public function create()
    {
    	return view('admin.category.add');
    }

    /**
     * Thực hiện Validate và thêm mới data vào database
     * Điều hướng đến danh sách danh mục
     */
    public function store(CateRequest $request)
    {
    	$data = [];
    	$data['name']		 = $request->txtCatName;
    	$data['description'] = $request->txtDescription;
    
    	$category = CategoryRepository::create($data);

    	return redirect()->route('admin.category.index')
    		->with([
                'flash_level'=>'success',
                'flash_message' => 'Thêm mới thành công'
            ]);
    }

    public function edit($id)
    {
    	// Lấy ra id danh mục cần chỉnh sửa
    	$category = CategoryRepository::find($id);
    	return view('admin.category.edit', compact('category'));
    }

    /**
     *  Cập nhật lại dữ liệu của id và lưu vào database
     * @param  Request $request 
     * @param  [type]  $id      
     * @return Điều hướng về danh sách danh mục
     */
    public function update(Request $request, $id)
    {
    	$data = [];
    	$data['name']		 = $request->txtCatName;
    	$data['description'] = $request->txtDescription;

    	$category = CategoryRepository::update($data, $id);

    	return redirect()->route('admin.category.index')
    		->with([
                'flash_level'=>'success',
                'flash_message' => 'Thêm mới thành công'
            ]);
    }

    public function destroy($id)
    {
    	/**
    	 * Tìm kiếm id danh mục cần xoá và thực hiện xoá danh mục
    	 * Điều hướng về danh sách
    	 */
    	$category = CategoryRepository::destroy($id);

    	return redirect()->route('admin.category.index')
    		->with([
                'flash_level'=>'success',
                'flash_message' => 'Xoá thành công'
            ]);
    }

}
