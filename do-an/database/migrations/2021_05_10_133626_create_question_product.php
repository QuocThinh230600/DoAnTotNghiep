<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author 
     */
    public function up()
    {
        Schema::create('question_product', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('question', 191);
            $table->text('answer');
            $table->string('status',191)->default('on');
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
        Schema::dropIfExists('question_product');
    }
}
