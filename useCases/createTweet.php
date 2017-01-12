<?php

require_once '../src/Tweet.php'; // wyjście do poziomu wyżej ..
require_once '../connection.php';

$tweet1 = new Tweet();

$tweet1->setText('Some 33311111111111less than 144 signs');
$tweet1->setUserId(3);
$tweet1->setCreationDate('2017-01-12');
        
$tweet1->saveToDB($conn);

$tweet2 = new Tweet();

$tweet2->setText('Some 333ki2222222222222 144 signs');
$tweet2->setUserId(3);
$tweet2->setCreationDate('2017-01-12');
        
$tweet2->saveToDB($conn);
$tweet3 = new Tweet();

$tweet3->setText('S33ome 333333333333 than 144 signs');
$tweet3->setUserId(3);
$tweet3->setCreationDate('2017-01-12');
        
$tweet3->saveToDB($conn);


$conn->close();
$conn = null;