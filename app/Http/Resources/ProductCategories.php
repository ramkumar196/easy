<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductCategories extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return[
            'category_name'=>$this->category_name,
            'category_id'=>$this->id,
            'status'=>$this->status,
            'variants'=>Variants::collection($this->variants),       
            'subCategory'=>ProductCategories::collection($this->category), 
            'category_link'=>url('catproducts/'.$this->id)      
            //'products'=>Products::collection($this->products())            
        ];
    }
}
