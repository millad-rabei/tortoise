<?php 

$config = array();
$config['host'] = 'localhost';
$config['user'] = 'root';
$config['pass'] = '';
$config['table'] = 'tortoise';

// connect to DB :
include 'mysqli.class.php';
$DB = new DB($config);

