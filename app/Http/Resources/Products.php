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
        // $productphoto=array();
        // foreach(explode(",",$this->product_photo) as $val)
        // {
           //$productphoto[]= url('/uploads/products/'.$val);
        //}

        return [
            'product_name'=>$this->product_name,
            'price'=>$this->price-round($this->price*($this->offer/100),2),
            'offer'=>$this->price,
            'offer_percent'=>$this->offer,
            'category_id'=>$this->category_id,
            'description'=>$this->description,
            'detail_description'=>$this->detail_description,
           // 'product_id'=>Crypt::encryptString($this->id,10),
            'product_id'=>$this->id,
            'status'=>$this->status,   
            'product_image'=>$this->product_photo_exists($this->product_photo),
            'product_image_2'=> $this->product_photo_exists($this->product_photo_2),
            'product_image_3'=> $this->product_photo_exists($this->product_photo_3),
            'product_image_4'=> $this->product_photo_exists($this->product_photo_4),
            'stock'=>$this->stock,
            'stock_status'=>$this->stock_status,
            'sale_available'=>$this->sale_available,
            'weight'=>$this->weight,
            'shipping_status'=>$this->shipping_status,
            'free_shipping'=>$this->free_shipping,
            'shipping_charge'=>$this->shipping_charge,
            'meta_keywords'=>$this->meta_keywords,
            'meta_description'=>$this->meta_description,
            'variants'=>$this->variants,   
            'product_link'=>url('productdetail/'.$this->id),        
            'product_images'=>array($this->product_photo_exists($this->product_photo),$this->product_photo_exists($this->product_photo_2),$this->product_photo_exists($this->product_photo_3),$this->product_photo_exists($this->product_photo_4))
        ];
    }


     public function product_photo_exists($photo)
     {
        if($photo != '')
        {
            if(file_exists( public_path() . '/uploads/products/' . $photo)) {
                return url('uploads/products/' . $photo);
            } else {
                return '';
            }
        }
        else
        {
            return '';
        }     
     }

}
