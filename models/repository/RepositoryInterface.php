<?php
//create interface
interface RepositoryInterface {
    //insert
    public function insert($input);
    //update
    public function update($input);
    //read
    public function read();
    //delete
    public function delete($id);
}