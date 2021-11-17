<?php
require_once './repository/RepositoryUser.php';
require_once './repository/RepositoryBank.php';
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {
            //Singleton
            return new RepositoryUser();
        } else if ($model == 'bank') {
            return new RepositoryBank();
        }
    }
}