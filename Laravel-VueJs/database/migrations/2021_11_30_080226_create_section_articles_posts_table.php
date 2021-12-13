<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionArticlesPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_articles_posts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('category_article_post_id');
            $table->tinyInteger('menu_main_header_id');
            $table->text('image_article');
            $table->text('title_article');
            $table->text('subtitle_article');
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
        Schema::dropIfExists('section_articles_posts');
    }
}
