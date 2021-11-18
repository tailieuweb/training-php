<?php
require_once 'models/RepositoryUser.php';
require_once 'models/RepositoryBank.php';
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {
            return new RepositoryUser();
        } else if ($model == 'bank') {
            return new RepositoryBank();
        }
    }
}