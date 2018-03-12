<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Wishlists extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
         return[
            'wish_id'=>$this->id,
            'user_id'=>$this->user_id,
            'product_id'=>$this->product_id,
            'status'=>$this->status,
            'products_detail'=>new Products($this->products)            
        ];
    }
}
