<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
use App\Http\Resources\Products as ProductResource;
use App\Http\Resources\ProductCategories;
use App\Http\Resources\Orders as OrderResource;
use App\Http\Resources\Wishlists as WishlistResource;
use App\Order;
use App\Wishlist;
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
         return View('frontend.pages.profile');
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

    public function wishlisting(Request $request)
    {
        if ($request->has('user_id')) {      
        $user_id=$request->input('user_id');
        $orders= Wishlist::where('user_id',$user_id)->get();
        return WishlistResource::collection($orders);
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

    public function userProfile($id)
    {
    	 $user = User::find($id);
    	 return $user;
    }

    public function update($id,Request $request)
    {

    	$validator=$request->validate([
            'email' => 'required|unique:users,email,'.$id,
            "phone" => 'required|numeric|unique:users,phone,'.$id,
            "password" => 'required|confirmed|min:6',
            "password_confirmation" => 'required|min:6',
            "name" => 'required'
        ]);
        $requested_data = $request->all(); 
        $requested_data['password']=bcrypt($requested_data['password']);
        $user = User::findOrFail($id);
        $user->update($requested_data);
        return $user;
    }
}
