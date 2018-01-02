<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
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
        'category_name', 'main_category', 'status'
    ];
        /**
     * The attributes that should be hidden for arrays.
     *ca
     * @var array
     */
     protected $hidden = [
    ];

     public function variants()
     {
         return $this->hasMany('App\Variants');
     }

}
