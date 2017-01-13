<?php
require_once 'connection.php';
require_once 'src/User.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && strlen(trim($_POST['email'])) >= 6) {

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $user = User::login($conn, $email, $password);
        if ($user) {
            $_SESSION['userId'] = $user->getId();
            header('Location: index.php');
        } else {
            echo 'Niepoprawne dane logowania.'
            . '<br> Jeżeli nie posiadasz konta załóż je.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Twiti</title>


    </head>
    <body>
        <div class="container">
            <div class="container">

                <form class="form-signin" action="#" method="POST">
                    <h3 class="form-signin-heading">Zaloguj się jeśli posiadasz konto</h3>
                    <h3 class="form-signin-heading">Please sign in</h3>
                    <label for="email" class="sr-only">Email address</label>
                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                </form>

            </div>


            <div class="container">
                <h4>Jeżeli jeszcze nie posiadasz konta załóż konto w serwisie</h4>
                <p>Skorzystaj z poniższego formularza</p>
                <form class="form-signin" action="register.php" method="POST">
                    <h2 class="form-signin-heading">Please Register</h2>
                    Nazwa użytkownika:
                    <label for="name" class="sr-only">User name</label>
                    <input name="name" type="text" class="form-control" placeholder="Type your user name" required autofocus>
                    Email użytkownika:
                    <label for="email" class="sr-only">Email address</label>
                    <input name="email" type="email" class="form-control" placeholder="Email address" required autofocus>
                    Hasło użytkownika:
                    <label for="password" class="sr-only">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Password" required>

                    <button class="btn btn-primary btn-block" type="submit">Zarejestruj się</button>

                </form>

            </div>

        </div>

    </body>
</html>