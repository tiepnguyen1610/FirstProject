<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class CartController extends Controller
{
	public function index()
	{	
		return view('frontend.layout.header');
	}

    public function add(Cart $cart,$id)
    {
    	$product = Product::findOrFail($id);
    	$cart->add($product);
    	return redirect()->back();
    }

    public function delete(Cart $cart,$id)
    {
    	$cart->delete($id);
    	return redirect()->back();
    }
}
