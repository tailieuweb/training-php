<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyMecBenVans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_mec_ben_vans', function (Blueprint $table) {
            $table->id();
            $table->string('title',150);
            $table->text('text',150);
            $table->text('text02',150);
            $table->text('text03',150);
            $table->text('load',10);
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
        Schema::dropIfExists('company_mec_ben_vans');
    }
}
