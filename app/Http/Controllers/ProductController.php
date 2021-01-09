<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use File;

class ProductController extends Controller
{
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
        if($request->hasFile('fImage')){
            $file =$request->fImage;
            $fileName = $file->getClientOriginalName();
            // Thư mục upload image product
            $uploadPath = public_path('/uploads/images');
        } 

    	$data = [];
    	$data['name']			= $request->txtProName;
    	$data['cat_id']			= $request->slrCategory;
    	$data['unitprice']		= $request->txtUnitPrice;
    	$data['promotionprice']	= $request->txtProPrice;
    	$data['description']	= $request->txtDescription;
        $data['image']          = $fileName;
        $file->move($uploadPath,$fileName);


    	$product = ProductRepository::create($data);

    	return redirect()->back()->with([
    			'flash_level' => 'success',
    			'flash_message' => 'Thêm dữ liệu thành công!' 
    		  ]);

    }
    
    /**
     * Lấy ra id sản phẩm cần update trả về form edit
     * Get id name category
     */
    public function edit($id)
    {
    	$product = ProductRepository::find($id);
    	$category = CategoryRepository::list(['id','name']);
    	return view('admin.product.edit',compact('product', 'category'));
    }

    /**
     * 
     */
    public function update(ProductRequest $request, $id)
    {

        if($request->hasFile('fImage')){

            $imageProduct = ProductRepository::find($id);
            if($imageProduct->image){
                File::delete('/public/uploads/images/'.$imageProduct->image);
            }
            $file =$request->fImage;
            $fileName = $file->getClientOriginalName();
            // Thư mục upload image product
            $uploadPath = public_path('/uploads/images');
        }

        $data = [];
        $data['name']           = $request->txtProName;
        $data['cat_id']         = $request->slrCategory;
        $data['unitprice']      = $request->txtUnitPrice;
        $data['promotionprice'] = $request->txtProPrice;
        $data['description']    = $request->txtDescription;
        $data['image']          = $fileName;
        $file->move($uploadPath,$fileName);

        $product = ProductRepository::update($data, $id);
        return redirect()->route('admin.product.index')
            ->with([
                'flash_level' => 'success',
                'flash_message' => 'Thêm dữ liệu thành công!' 
              ]);
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
