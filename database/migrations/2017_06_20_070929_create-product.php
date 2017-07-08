<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table){
          $table->increments('id');
          $table->string('product_name');
          $table->string('product_company');
          $table->string('quantity')->default('1');
          $table->float('price', 8, 2);
          $table->date('mfg_date');
          $table->date('exp_date');
          $table->date('arrival_date');
          $table->string('distributor')->default('null');
          $table->string('batch')->default('null');
          $table->string('img')->default('null');
          $table->string('flag')->default('1');
          $table->rememberToken();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('products');
    }
}
