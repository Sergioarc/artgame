<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description', 140);
            $table->string('sku', 3);
            $table->integer('model_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('model_items');
    }
}
