
<?php


session_start();

unset($_SESSION['userId']);
unset($_SESSION['id']);
session_destroy();


header('Location: index.php');

