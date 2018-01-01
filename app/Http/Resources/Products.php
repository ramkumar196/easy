<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Crypt;

class Products extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        $productphoto=array();
        foreach(explode(",",$this->product_photo) as $val)
        {
           $productphoto[]= url('/uploads/products/'.$val);
        }

        return [
            'product_name'=>$this->product_name,
            'price'=>$this->price,
            'offer'=>$this->offer,
            'category_id'=>$this->category_id,
           // 'product_id'=>Crypt::encryptString($this->id,10),
            'product_id'=>$this->id,
            'status'=>$this->status,   
            'product_image'=>$productphoto[0],       
            'product_images'=>$productphoto,
            'stock'=>$this->stock,
            'sale_available'=>$this->sale_available,
            'weight'=>$this->weight,
            'shipping_status'=>$this->shipping_status,
            'free_shipping'=>$this->free_shipping,
            'shipping_charge'=>$this->shipping_charge,
            'meta_keywords'=>$this->meta_keywords,
            'meta_description'=>$this->meta_description
        ];
    }
}
