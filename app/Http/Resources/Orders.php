<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Orders extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'order_id'=>$this->id,
            'user_id'=>$this->user_id,
            'product_id'=>$this->product_id,
            'quantity'=>$this->quantity,
            'subtotal'=>$this->subtotal,
            'total'=>$this->total,
            'status'=>$this->status,
            'products_detail'=>new Products($this->products)            
        ];
    }
}
