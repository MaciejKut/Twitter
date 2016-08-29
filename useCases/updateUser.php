<?php

require_once '../src/User.php';
require_once '../connection.php';


$user = User::loadUserById($conn, 5);
$user->setName('Nowa nazwa');
var_dump($user->saveToDB($conn));

$user = User::loadUserById($conn, 5);
var_dump($user);

$conn->close();
$conn = null;