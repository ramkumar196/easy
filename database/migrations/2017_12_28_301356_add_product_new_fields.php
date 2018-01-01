<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
          $table->text('detail_description')->after('category_id');  
          $table->integer('store_id')->default(0)->unsigned()->after('detail_description'); 
          $table->integer('offer_type')->default(0)->after('store_id'); 
          $table->integer('stock')->default(0)->unsigned()->after('offer_type'); 
          $table->integer('stock_status')->default(1)->unsigned()->after('stock'); 
          $table->integer('sale_available')->default(1)->after('stock_status');         
          $table->double('weight',8,2)->default(0)->after('sale_available'); 
          $table->integer('shipping_status')->default(1)->after('weight');
          $table->integer('free_shipping')->default(1)->after('shipping_status'); 
          $table->double('shipping_charge',8,2)->default(0)->after('free_shipping');
          $table->string('meta_keywords')->after('shipping_charge');  
          $table->text('meta_description')->after('meta_keywords'); 
          $table->string('status')->default('A')->after('meta_description'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
