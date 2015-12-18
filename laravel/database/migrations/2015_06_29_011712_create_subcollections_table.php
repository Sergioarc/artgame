<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcollections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('sku');
            $table->integer('collection_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subcollections');
    }
}
