<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            // Increments : khoa chinh & tu. dong. tang
            // unsigned so nguyen khong am
            $table->increments('id')->unsigned();
            // varchar : max 100 charater
            // unique username khong trung nhau
            $table->string('username', 60)->unique();
            $table->string('password', 50);
            // unique email khong trung nhau
            $table->string('email', 50)->unique();
            // default gan gia tri mac. dinh.
            $table->tinyInteger('role')->default(-1);
            $table->tinyInteger('status')->default(1);
            $table->string('phone',20);
            // nullable duoc. phep rong
            $table->text('address')->nullable();

            // create_at va updated_at
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
        Schema::dropIfExists('admins');
    }
}
