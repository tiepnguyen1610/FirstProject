<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductRepository
{
	/**
	 *  Creating new data
	 */
	public static function create(array $data = [])
	{
		if(!count($data)) {
			return;
		}
		$product = null;
		try {
			$product = Product::create($data);
		} catch (\Exception $e){
			dd($e->getMessage());
		}
		return $product;
	}

	/**
	 * Show data on the database out of the form
	 */
	public static function list(array $fields = [])
	{
		$products = Product::orderBy('id', 'DESC')
            ->with('category');

        if(count($fields)){
        	$products->select($fields);
        }
        return $products->get();
	}

	/**
	 * 
	 */
	public static function update()
	{

	}

	/**
	 * Tìm đến id cần xoá
	 * Thực hiện xoá file image trong storage
	 * Xoá toàn bộ dữ liệu trên database
	 */
	public static function destroy($id)
	{
		$product = Product::findOrFail($id);
		Storage::delete($product->image);
		return $product->delete();
	}

}