<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Wishlists extends ResourceCollection
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
            'order_id'=>$this->id,
            'user_id'=>$this->user_id,
            'product_id'=>$this->product_id,
            'status'=>$this->status,
            'products_detail'=>Products::collection($this->products())            
        ];
    }
}
