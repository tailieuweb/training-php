<?php

interface IBankRepository{
    public function findUserByID($id);
    public function getAllBank();
}