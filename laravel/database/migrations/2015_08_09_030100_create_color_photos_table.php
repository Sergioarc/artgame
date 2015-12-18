<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('color_photos',function($table){
            $table->increments('id');
            $table->string('photo_file_name')->nullable();
            $table->string('photo_file_size')->nullable();
            $table->string('photo_content_type')->nullable();
            $table->timestamp('photo_updated_at');   
            $table->integer('color_id')->unsigned(); 
            $table->timestamps();

            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('color_photos');
    }
}
