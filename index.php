<?php

session_start();

if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
}


?>

<html>
    <head> </head>
    <body>
        
        Strona główna Tłitera
        
    </body>
    
    
</html>