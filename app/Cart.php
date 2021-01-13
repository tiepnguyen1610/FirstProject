<?php

namespace App;

class Cart
{
	public $items = [];
	public $totalPrice = 0;
	public $totalQuantity = 0;

	public function __construct()
	{
		$this->items = session('cart') ? session('cart') : [];
		$this->totalPrice = $this->getTotal_Price();
		$this->totalQuantity = $this->getTotal_Quantity();
	}

	/**
	 * add a product to shopping cart
	 */
	public function add($product, $quantity = 1)
	{
		$item = [
			'id' => $product->id,
			'name' => $product->name,
			'price' => ($product->promotionprice != 0) ? $product->promotionprice : $product->unitprice,
			'image' => $product->image,
			'quantity' => $quantity,
		];

		if(isset($this->items[$product->id])){
			$this->items[$product->id]['quantity'] += $quantity;
		}else{
			$this->items[$product->id] = $item;
		}
		
		session(['cart' => $this->items]);
		//dd($this->items);
	}

	/**
	 * updates a product to shopping cart
	 */
	public function update($id, $quantity = 1)
	{
		if(isset($this->items[$id])){
			$this->items[$product->id]['quantity'] = $quantity;
		}
		session(['cart' => $this->items]);
	}

	/**
	 * delete a product to shopping cart
	 */
	public function delete($id)
	{
		if(isset($this->items[$id])){
			$this->items[$id]['quantity']--;
			$this->totalQuantity--;
			if($this->items[$id]['quantity'] <= 0){
				unset($this->items[$id]);
			}
		}
		session(['cart' => $this->items]);
	}

	public function getTotal_Price()
	{
		$total = 0;
		foreach($this->items as $item){
			$total += $item['price']*$item['quantity'];
		}
		return $total;
	}

	public function getTotal_Quantity()
	{
		$total = 0;
		foreach($this->items as $item){
			$total += $item['quantity'];
		}
		return $total;
	}

}

?>