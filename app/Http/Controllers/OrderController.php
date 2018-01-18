<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use View;
use App\Http\Resources\Orders as OrderResource;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();
        if ($request->has('id')) {      
            $id = $request->input('id');
        $products= Order::where('id', $id)->get();
            }
        return OrderResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $requestData = $request->all();
         $requestData['status']=0;

         Order::create($requestData);
        return ['message' => 'Product added to card!'];


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $order = Order::findOrFail($id);
        $requestData = $request->all();
        $order->update($requestData);
        return ['message' => 'Order Updated!'];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $order = Order::findOrFail($id);
        $order->delete();
        return 204;
    }    
}
