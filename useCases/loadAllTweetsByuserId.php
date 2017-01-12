<?php


require_once '../src/Tweet.php';
require_once '../connection.php';

$tweets = Tweet::loadAllTweetByUserId($conn, 2);
var_dump($tweets);

$conn->close();
$conn = null;