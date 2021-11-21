<?php
require './models/BaseModel.php';
class UserRepositoryPattern extends BaseModel{

    public function getUser_repository($params = []){
          //Keyword
          if (!empty($params['keyword'])) {
            $str_keyword = $this->matchRegexInput($params);
            $str_keyword =  '%' . $params['keyword'] . '%';
            $sql = $this->connectDatabase()->prepare('SELECT * FROM users WHERE name LIKE ?');
            $sql->bind_param('s', $str_keyword);
        } else {
            $sql = $this->connectDatabase()->prepare('SELECT * FROM users');
        }
        $result = $this->select_result($sql) ? $this->select_result($sql) : [];
        return $result;
    }
}