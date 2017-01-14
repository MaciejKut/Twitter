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

            $user = User::login($conn, $email, $password);
            if ($user) {
                $_SESSION['userId'] = $user->getId();
                header('Location: index.php');
            } else {
                echo 'Niepoprawne dane logowania.'
                . '<br> Jeżeli nie posiadasz konta załóż je.';
            }
        } else {
            echo 'Wpisałeś zbyt krótkie hasło lub email istnieje już w bazie';
            echo '<br> <a href="login.php">Spróbuj ponownie</a>';
           // header('Location: login.php');
        }
    }
}
?>
<html>
    <head><body>



    </body></head>
</html>