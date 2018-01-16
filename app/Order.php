<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','product_id','quantity','subtotal','total','status'
    ];
        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     protected $hidden = [
    ];

    public function products()
     {
         return $this->belongsTo('App\Product','product_id');
     }



}
