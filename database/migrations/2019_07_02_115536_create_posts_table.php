<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title',100);
            $table->string('slug',150);
            $table->string('spao',180);
            $table->integer('categories_id')->unsigned();
            $table->string('avatar',120);
            $table->tinyInteger('status')->default(1);
            $table->dateTime('publish_date')->nullable();
            $table->tinyInteger('lang_id')->default(1);
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
        Schema::dropIfExists('posts');
    }
}
