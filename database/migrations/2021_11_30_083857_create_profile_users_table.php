<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('fullName')->nullable();
            $table->string('phone')->nullable();
            $table->dateTime('Date')->nullable();
            $table->string('address')->nullable();
            $table->string('image_profile')->nullable();
            $table->timestamps();
            //lieen ket khoa ngoai voi bang users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_users');
    }
}
