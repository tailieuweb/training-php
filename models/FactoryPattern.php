<?php
require_once 'Post.php';
require_once 'Category.php';
require_once 'Comment.php';

class FactoryPattern{
    public function make($model){
        $object = null;
        if($model === 'post'){
            $object = new Post();
        }else if($model === 'cate'){
            $object = new Category();
        }else if($model === 'comment'){
            $object = new Comment();
        }
        return $object;
    }
}

?>