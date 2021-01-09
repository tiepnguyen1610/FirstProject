<?php

namespace App\Repositories;

use App\Product;
use File;

class ProductRepository
{

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
	 * 
	 */
	public static function update(array $data = [], $id)
	{
		if (!count($data)) {
            return;
        }

        $product = Product::findOrFail($id);

        return $product->update($data);
	}

	/**
	 *  Find Id
	 */
	public static function find($id)
	{
		$product = Product::where('id',$id);
		return $product->firstOrFail();
	}

	/**
	 * Tìm đến id cần xoá
	 * Xoá toàn bộ dữ liệu trên database
	 */
	public static function destroy($id)
	{
		$product = Product::findOrFail($id);
		File::delete('public/uploads/images/'.$product->image);
		return $product->delete();
	}

}