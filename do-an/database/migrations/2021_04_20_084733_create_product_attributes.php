<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author 
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('attribute');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('value');
            $table->softDeletes();
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
        Schema::dropIfExists('product_attributes');
    }
}
