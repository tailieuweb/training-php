<?php
session_start();

require 'head.php';

$factory = new FactoryPattern();
$comment = $factory->make('comment');

$comment = new Comment();
if (!empty($_GET['idPost'])) {
    $listComment = $comment->getByIDPost($_GET['idPost']);

    echo ListComment::view($listComment);

    if (!empty($_SESSION['comment']['post'])){
        echo $_SESSION['comment']['post'];
        unset($_SESSION['comment']['post']);
    }
    echo('đây nè');
}