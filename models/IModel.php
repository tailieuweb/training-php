<?php
interface IModel{
    public function selectData($params = []);
    public function insertData($input);
    public function updateData($input);
    public function deleteData($id);
    public function findDataById($id);
}