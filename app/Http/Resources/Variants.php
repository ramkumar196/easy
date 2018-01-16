<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Variants extends Resource
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
            'variant_name'=>$this->variant_name,
            'variant_type'=>$this->variant_type,
            'variant_value'=>explode(',',$this->variant_value),
            'variant_id'=>$this->id
        ];
    }
}
