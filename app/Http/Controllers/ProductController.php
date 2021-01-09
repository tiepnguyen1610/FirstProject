<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    /**
     * Hiển thị form nhập dữ liệu để thêm dữ liệu vào database
     */
    public function create()
    {
    	$category = CategoryRepository::list(['id','name']);
    	return view('admin.product.add',compact('category'));
    }

    /**
     * Validate dữ liệu và lưu vào database
     * Điều hướng về trang danh sách sản phẩm
     */
    public function store(ProductRequest $request)
    {
    	$data = [];
    	$data['name']			= $request->txtProName;
    	$data['cat_id']			= $request->slrCategory;
    	$data['unitprice']		= $request->txtUnitPrice;
    	$data['promotionprice']	= $request->txtProPrice;
    	$data['description']	= $request->txtDescription;

    	$pathMain = $request->file('fImage')->store('public/uploads');
    	$data['image'] = $pathMain;

    	$product = ProductRepository::create($data);

    	return redirect()->route('admin.product.index')
    		->with([
    			'flash_level' => 'success',
    			'flash_message' => 'Thêm dữ liệu thành công!' 
    		]);

    }

    /**
     *  Show ra danh sách sản phẩm
     */
    public function index()
    {
    	$products = ProductRepository::list(
    		['id','name','cat_id','unitprice','image','created_at']
    	);
    	return view('admin.product.list',compact('products'));
    }

    /**
     * 
     */
    public function edit()
    {

    }

    /**
     * 
     */
    public function update()
    {

    }

    /**
     * 
     */
    public function destroy($id)
    {
    	$product = ProductRepository::destroy($id);
    	return redirect()->route('admin.product.index')
    		->with([
    			'flash_level' => 'success',
    			'flash_message' => 'Xoá dữ liệu thành công'
    		]);
    }

}
