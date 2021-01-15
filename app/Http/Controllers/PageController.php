<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;


class PageController extends Controller
{
    public function getIndex()
    {
        $slides = Slide::all();
        $new_products = Product::orderBy('id', 'DESC')->paginate(8);
        $sale_products = Product::where('promotionprice', '>', 0)->paginate(8);       
    	return view('frontend.pages.home',compact('slides', 'new_products', 'sale_products'));
    }

    public function getTypeProduct($catid)
    {
        $typeproducts = Product::where('cat_id', $catid)->paginate(6);
        $products_other = Product::where('cat_id','<>',$catid)->paginate(3);
    	return view('frontend.pages.producttype', compact('typeproducts', 'products_other'));
    }

    public function getDetailProduct($id)
    {
        $detail_product = Product::where('id',$id)->first();
        $related_products = Product::where('cat_id',$detail_product->cat_id)
                                    ->where('id','<>',$id)->paginate(3);
        return view('frontend.pages.detailproduct', compact('detail_product','related_products'));
    }

    public function getContact()
    {
        return view('frontend.pages.contact');
    }

     public function getAbout()
    {
        return view('frontend.pages.about');
    }
    
}
