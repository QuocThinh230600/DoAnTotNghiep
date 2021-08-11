<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author 
     */
    public function up()
    {
        Schema::create('bonus_product', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->bigInteger('product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @author 
     */
    public function down()
    {
        Schema::dropIfExists('bonus_product');
    }
}
