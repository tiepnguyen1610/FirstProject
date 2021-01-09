<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Slide\SlideRequest;
use App\Slide;
use File;

class SildesController extends Controller
{
    /**
     * Lấy dữ liệu từ database đổ ra danh sách slides
     */
    public function index()
    {
    	$data = Slide::select('id','name','image')->orderBy('id','ASC')->get()->toArray();
    	return view('admin.slide.list',compact('data'));
    }

    /**
     * Hiển thị ra form thêm mới dữ liệu
     */
	public function create()
    {
    	return view('admin.slide.add');
    }

    /**
     * Thực hiện Validate và thêm mới data vào database
     * Điều hướng đến danh sách slides
     */
    public function store(SlideRequest $request)
    {
    	$slide = new Slide();

    	if($request->hasFile('slide')) {

    		$file =$request->slide;
    		$fileName = $file->getClientOriginalName();
    		// Thư mục upload
			$uploadPath = public_path('/uploads');
    	}

    	$slide->name 	=$request->txtSlideName;
    	$slide->image 	=$fileName;
    	$slide->save();
    	$file->move($uploadPath,$fileName);

    	return redirect()->route('admin.slide.index')
    		->with([
    			'flash_level' => 'success',
    			'flash_message' => 'Thêm mới thành công'
    		]);
    }

    /**
     * Lấy ra id slide cần chỉnh sửa
     * 
     */
    public function edit()
    {

    }

    /**
     * Cập nhật lại dữ liệu của id và lưu vào database
     * Điều hướng về danh sách slides
     */
    public function update()
    {

    }

    /**
     * Tìm kiếm id slide cần xoá và thực hiện xoá dữ liệu và file slide
     * Điều hướng về danh sách slides
     */
    public function destroy($id)
    {
    	$slide = Slide::find($id);
    	File::delete('public/uploads/'.$slide->image);
    	$slide->delete($id);

    	return redirect()->route('admin.slide.index')
    		->with([
    			'flash_level' => 'success',
    			'flash_message' => 'Xoá Thành Công !'
    		]);
    }

}
