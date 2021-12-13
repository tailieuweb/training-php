<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePostCommentRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comment_ratings', function (Blueprint $table) {
            $table->id();
            $table->longText('text_content');
            $table->integer('star_rating');
            $table->integer('post_id');
            $table->integer('author_id');
            $table->string('author_type',10)->default('member');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('post_comment_ratings');
    }
}
