<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variants extends Model
{
    //
        //
   // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'variant_name', 'variant_type','product_category_id','status','variant_value'
    ];
        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     protected $hidden = [
    ];


    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }


}
