<?php

require_once '../src/User.php';
require_once '../connection.php';

$user = User::loadUserById($conn, 5);

var_dump($user);

$user2 = User::loadUserById($conn, 3);

var_dump($user2);

$conn->close();
$conn = null;