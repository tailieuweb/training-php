<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubeventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subevent', function (Blueprint $table) {
            $table->id();
            $table->string('subevent_item',500);
            $table->string('event_introduce',2000);
            $table->string('event_introduce_title',500);
            $table->string('event_img',2000);
            $table->string('event_img_title_1',500);
            $table->string('event_img_title_2',500);
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
        Schema::dropIfExists('subevent');
    }
}
