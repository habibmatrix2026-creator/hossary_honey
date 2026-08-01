<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    //
    //start index function
    public function index(){
        if(Auth::check() && Auth::user()->user_type == "admin")
            return view("admin.dashboard");
        return view("home.index");
    }
    //end index function
    //start goHome function
    public function goHome(){
        return view("home.index");
    }
    //end goHome function
    //start cart function
    public function cart()
    {
        return view("home.cart");
    }
    //end cart function
}
