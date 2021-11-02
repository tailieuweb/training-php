<?php

require_once './models/repository/RepositoryUser.php';
$repositoryUser = new RepositoryUser();
var_dump($repositoryUser->read());
