<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifiable;

class Product extends Model
{
    //
   // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name', 'description', 'price','offer','category_id','status','product_photo','stock','sale_available','weight','shipping_status','free_shipping','shipping_charge','meta_keywords','meta_description','detail_description','product_photo_2','product_photo_3','product_photo_4'
    ];
        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     protected $hidden = [
    ];

    // public function orders()
    // {
    //     return $this->hasOne('App\Order');
    // }



}
