<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collection_id')->unsigned();
            $table->integer('subcollection_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('model_item_id')->unsigned();
            $table->integer('color_id')->unsigned()->nullable();
            $table->integer('size_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('RESTRICT');
            $table->foreign('subcollection_id')->references('id')->on('subcollections')->onDelete('RESTRICT');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('RESTRICT');
            $table->foreign('model_item_id')->references('id')->on('model_items')->onDelete('RESTRICT');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('SET NULL');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stock');
    }
}
