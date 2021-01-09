<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{

	/**
	 *  Creat data
	 */
	public static function create(array $data = [])
	{
		if(!count($data)){
			return;
		}
		return Category::create($data);
	}

	/**
	 *  Get List Data
	 */
	public static function list(array $fields = [])
	{
		$categories = Category::orderBy('id');

		if (count($fields)) {
			$categories->select($fields);
		}
		return $categories->get();
	}

	/**
	 *  Find ID
	 */
	public static function find($id)
	{
		$category = Category::where('id', $id);
		return $category->firstOrFail();
	}

	/**
	 *  Update Data
	 */
	public static function update(array $data = [], $id)
	{
		if(!count($data)) {
			return;
		}
		$category = Category::findOrFail($id);
		return $category->update($data);
	}

	/**
	 *  Destroy Id Data
	 */
	public static function destroy($id)
	{
		$category = Category::findOrFail($id);
        return $category->delete();
	}


}