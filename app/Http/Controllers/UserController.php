<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function getSignup()
    {
    	return view('frontend.pages.signup');
    }

    public function postSignup()
    {

    }

    public function getLogin()
    {
    	return view('frontend.pages.login');
    }
    
    public function postLogin()
    {

    }

}
