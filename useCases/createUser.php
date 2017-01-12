<?php

require_once '../src/User.php'; // wyjście do poziomu wyżej ..
require_once '../connection.php';

$user1 = new User();
$user1->setName('Maciej');
$user1->setEmail('abc123@abc123.pl');
$user1->setPassword('abc123');

var_dump($user1->saveToDB($conn));

$conn->close();
$conn = null;