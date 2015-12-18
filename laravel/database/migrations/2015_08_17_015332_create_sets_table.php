<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('subcollection_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('subcollection_id')->references('id')->on('subcollections')->onDelete('cascade');
        });

        Schema::create('set_photos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('photo_file_name')->nullable();
            $table->string('photo_file_size')->nullable();
            $table->string('photo_content_type')->nullable();
            $table->timestamp('photo_updated_at');    
            $table->integer('set_id')->unsigned();
            $table->timestamps();
            $table->foreign('set_id')->references('id')->on('sets')->onDelete('cascade');
        });

        Schema::create('model_item_set', function(Blueprint $table) {
            $table->integer('model_item_id')->unsigned();
            $table->integer('set_id')->unsigned();

            $table->foreign('set_id')->references('id')->on('sets')->onDelete('cascade');
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
        Schema::drop('model_item_set');
        Schema::drop('set_photos');
        Schema::drop('sets');
    }
}
