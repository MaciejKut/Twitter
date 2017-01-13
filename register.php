<?php

require_once 'src/User.php';
require_once 'connection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && strlen(trim($_POST['email'])) >= 6) {

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $name = trim($_POST['name']);

        $newUser = new User();
        $newUser->setName($name);
        $newUser->setEmail($email);
        $newUser->setPassword($password);
        if ($newUser->saveToDB($conn)) {
            $_SESSION['userId'] = $user->getId();
            header('Location: index.php');
        }
    } else {
        echo 'Wrong password - must have minimum 6signs';
    }
} 
