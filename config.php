<?php 

$config = array();
$config['host'] = 'localhost';
$config['user'] = 'root';
$config['pass'] = '';
$config['table'] = 'tortoise';

// connect to DB :
include_once 'mysqli.class.php';
$db = new DB($config);

