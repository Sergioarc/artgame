<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors',function($table){
            $table->increments('id');
            $table->tinyInteger('sku');
            $table->string('name');
            $table->integer('model_item_id')->unsigned();
            $table->timestamps();

            $table->foreign('model_item_id')->references('id')->on('model_items')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('colors');
    }
}
