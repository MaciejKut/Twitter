<?php

require_once 'connection.php';
require_once 'src/User.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['email']) && strlen(trim($_POST['email'])) >=6){
        
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $user =  User::login($conn, $email, $password);
        if($user){
            $_SESSION['userId'] = $user->getId();
            header('Location: index.php');
        }  else {
            echo 'Niepoprawne dane logowania';
        }
        
        
    }
}

?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>tłiter</title>
</head>
<body>

<form action="" method="POST">
    <label>E-mail:<br>
        <input type="text" name="email">
    </label>
    <br>
    <label>Password:<br>
        <input type="password" name="password">
    </label>
    <br>
    <input type="submit" value="Login">
    
</form>

</body>
</html>