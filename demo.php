<?php

require_once './models/RepositoryUser.php';
$repositoryUser = new RepositoryUser();

var_dump($repositoryUser->read());
