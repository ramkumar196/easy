<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
use App\Http\Resources\Products as ProductResource;
use App\Http\Resources\ProductCategories;
use App\Http\Resources\Orders as OrderResource;
use App\Order;
use App\User;


use View;
use DB;


class UserController extends Controller
{
    //
    public function checkout()
    {
         return View::make('frontend.pages.checkout');
    }


    public function profile()
    {
         return View::make('frontend.pages.profile');
    }

    public function wishlist()
    {
         return View::make('frontend.pages.wishlist');
    }

    public function cartlist(Request $request)
    {
        if ($request->has('user_id')) {      
        $user_id=$request->input('user_id');
        $orders= Order::where('status', 0)->where('user_id',$user_id)->get();
           // return $orders;
        return OrderResource::collection($orders);
        }
        else
        {
            return array();
        }
    }

    public function cartview()
    {
        return View::make('frontend.pages.cartlist');
    }

    public function update(Request $request)
    {
    	$user_id=$request->input('user_id');

    	$validator=$request->validate([
            'email' => 'required|unique:users,email,'.$user_id,
            "phone" => 'required|unique:users,phone,'.$user_id,
            "password" => 'required',
            "repassword" => 'required',
            "name" => 'required'
        ]); 
        $user = User::findOrFail($user_id);
        $user->update($request->all());
        return $user;
    }
}
