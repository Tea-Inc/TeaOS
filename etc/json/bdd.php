<?php

$general = array(
    "host"=>"localhost",
    "port"=>3306,
    "db"=>"teaos2",
    "user"=>"root",
    "password"=>""
);

$bdd = new PDO('mysql:host='.$general['host'].';dbname='.$general['db'], $general['user'], $general['password']);