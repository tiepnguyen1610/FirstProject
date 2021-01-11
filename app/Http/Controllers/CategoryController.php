<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Cate\CateRequest;

class CategoryController extends Controller
{
    
    /**
     * List all category
     */
	public function index()
    {
    	
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
     * Validate data
     * creates a category
     */
    public function store(CateRequest $request)
    {
    	$data = [];
    	$data['name']		 = $request->txtCatName;
    	$data['description'] = $request->txtDescription;
    
    	$category = CategoryRepository::create($data);

    	return redirect()->back()->with([
                'flash_level'=>'success',
                'flash_message' => 'Thêm mới thành công'
            ]);
    }

    /**
     * Get's id category
     * @param
     */
    public function edit($id)
    {
    	$category = CategoryRepository::find($id);
    	return view('admin.category.edit', compact('category'));
    }

    /**
     *  Updates a category
     * @param  Request $request 
     */
    public function update(CateRequest $request, $id)
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

    /**
     * Deletes a category
     */
    public function destroy($id)
    {
    	
    	$category = CategoryRepository::destroy($id);

    	return redirect()->route('admin.category.index')
    		->with([
                'flash_level'=>'success',
                'flash_message' => 'Xoá thành công'
            ]);
    }

}
