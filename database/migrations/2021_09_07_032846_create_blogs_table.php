<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('blogs')) {
            Schema::create('blogs', function 
            (Blueprint $table) {
             $table->bigIncrements('id');
             $table->string('title');
             $table->text('content');
             $table->string('image_path')->nullable();
             $table->timestamps();
             $table->string('category');
          });  
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
