<?php

require_once './models/repository/RepositoryUser.php';
require_once './models/repository/RepositoryBank.php';
$repositoryUser = new RepositoryUser();
$repositoryBank= new RepositoryBank();
var_dump($repositoryUser->read());
var_dump($repositoryBank->read());
