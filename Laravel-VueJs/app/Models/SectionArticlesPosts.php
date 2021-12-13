<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionArticlesPosts extends Model
{
    protected $table = 'section_articles_posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'category_article_post_id',
        'menu_main_header_id',
        'image_article',
        'title_article',
        'subtitle_article'
    ];
    use HasFactory;
}
