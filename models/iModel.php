<?php
interface iModel
{
    public function __construct();
    public function insert(String $sql);
    public function query(String $sql);
    public function select(String $sql);
    public function delete(String $sql);
    public function update(String $sql);
    public function BlockSQLInjection(String $str);
}