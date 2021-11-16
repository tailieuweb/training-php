<?php
session_start();

if (!empty($_GET['username']) && !empty($_GET['comment']) && !empty($_GET['idPost'])) {
     require '../../config/database.php';
     require '../../models/Database.php';
     require '../../models/FactoryPattern.php';
    
    $factory = new FactoryPattern();
    $comment = $factory->make('comment');

    $username = $_GET['username'];
    $content = $_GET['comment'];
    $idPost = $_GET['idPost'];

    date_default_timezone_set('Asia/Bangkok');
    $date = date('Y-m-d h:i:s');


    $comment->insert($username, $content, $idPost, $date);
}