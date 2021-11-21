<?php
function decryptionID($id)
{
    $id = substr($id, 0, -4);
    $id = substr($id, 4);    
    return  $id;
}
function encodeID($id)
{
    $randomFirst = random_int(1000, 9999);
    $randomTail =  random_int(1000, 9999);
    return $randomFirst . $id . $randomTail;
}
