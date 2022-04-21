<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('image');
            $table->integer('user_id');
            $table->string('slug');
            $table->integer('views');
            $table->integer('category_id');
            $table->boolean('active');
            $table->string('vin');
            $table->float('price');
            $table->integer('model_id');
            $table->integer('manufacturer_id');
            $table->integer('years');
            $table->integer('type_id');
            $table->integer('color_id');
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
        Schema::dropIfExists('ads');
    }
}
