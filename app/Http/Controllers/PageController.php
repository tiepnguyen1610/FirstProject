<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
    	return view('frontend.pages.home');
    }

    public function getTypeProduct()
    {
    	return view('frontend.pages.producttype');
    }

    public function getDetailProduct()
    {
        return view('frontend.pages.detailproduct');
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
