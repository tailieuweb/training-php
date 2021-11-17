<?php
session_start();
unset($_SESSION['last_id']);
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $control = $_GET['control'];
    if ($control == 1){
        $_SESSION['cart'][$id]++;
    }else if ($control == 2){
        $_SESSION['cart'][$id]--;
        if ( $_SESSION['cart'][$id] <= 0){
            $_SESSION['cart'][$id]=0;
        }
    }
    else if ($control == 3){
        unset($_SESSION['cart'][$id]);
        unset($_SESSION['id'][$id]);
    }
    header("location:cart.php");
}
else if (isset($_GET['control'])){
    $control = $_GET['control'];
    if ($control == 4){
        session_unset();
    }
    header("location:cart.php");
}
else{
    header("location:index.php");
}