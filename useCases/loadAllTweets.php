<?php

require_once '../src/Tweet.php';
require_once '../connection.php';

$allTweets = Tweet::loadAllTweets($conn);





foreach ($allTweets as $value) {

    var_dump($value);
}


$conn->close();
$conn = null;

