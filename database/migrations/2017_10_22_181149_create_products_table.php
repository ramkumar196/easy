<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function (Blueprint $table) {
          $table->increments('id');
          $table->string('product_name')->unique();
          $table->text('description');
          $table->double('price',8,2)->default(0);
          $table->double('offer',8,2)->default(0);
          $table->string('product_photo');
          $table->integer('category_id')->default(0)->unsigned();                                                                           
          $table->string('status')->default('A');
          $table->rememberToken();
          $table->timestamps();
      });
    }    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
