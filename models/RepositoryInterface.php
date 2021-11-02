<?php
interface RepositoryInterface {
    public function insert($input);
    public function update($input);
    public function read();
    public function delete($id);
}