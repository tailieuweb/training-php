<?php
class Cart
{
    public static function InsertCart($id)
    {
        if (isset($_SESSION['mycart'][$id])) {
            $_SESSION['mycart'][$id]++;
        } else {
            $_SESSION['mycart'][$id]=1;
        }
    }
    public static function DeleteCart($id)
    {
        if (isset($_SESSION["mycart"][$id])) {
            unset($_SESSION['mycart'][$id]);
        }
        
    }
    public static function UpdateCart($id, $quantity)
    {
        if (isset($_SESSION["mycart"][$id])) {
            $_SESSION['mycart'][$id] = $quantity;
        }
    }
}