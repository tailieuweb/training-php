<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryArticlePost extends Model
{
    protected $table = 'category_article_post';
    use HasFactory;
    protected $fillable = [
        'category_post_name',
        'menu_main_header_id',
        'feature_description',
        'icon',
        'enabled'
    ];
}
