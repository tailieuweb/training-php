<?php
require_once 'Post.php';
require_once 'Category.php';
require_once 'Comment.php';

class SingletonPattern {
    public function make($model){
        if($model == 'post'){
            return Post::getInstance();
        }else if($model == 'cate'){
            return Category::getInstance();
        }
    }
}

?>