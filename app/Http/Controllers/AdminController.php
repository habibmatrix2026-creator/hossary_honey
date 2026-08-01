<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    //start dashboard function
    public function dashboard()
    {
        return view("admin.dashboard");
    }
    //end dashboard function
    //start category function
    public function category(){
        return view("admin.category");
    }
    //end category function
    //start product function
    public function product()
    {
        return view("admin.product");
    }
    //end product function
    //start user function
    public function user()
    {
        return view("admin.user");
    }
    //end user function
    //start order function
    public function order()
    {
        return view("admin.order");
    }
    //end order function
       //start order_item function
    public function order_item()
    {
        return view("admin.order_item");
    }
    //end order_item function

}
