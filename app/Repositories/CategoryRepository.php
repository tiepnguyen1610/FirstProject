<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{

	/**
	 *  Get's all category by it's ID
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
	 *  Created new category
	 */
	public static function create(array $data = [])
	{
		if(!count($data)){
			return;
		}
		return Category::create($data);
	}

	/**Get's a category by it's ID
	 */
	public static function find($id)
	{
		$category = Category::where('id', $id);
		return $category->firstOrFail();
	}

	/**
	 *  Updated a category
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
	 *  Deleted a category
	 */
	public static function destroy($id)
	{
		$category = Category::findOrFail($id);
        return $category->delete();
	}


}