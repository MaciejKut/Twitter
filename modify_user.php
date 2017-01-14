<?php
require_once 'src/User.php';
require_once 'connection.php';

session_start();

if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
}
$user = User::loadUserById($conn, $_SESSION['userId']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    switch ($_POST['submit']) {
        case 'name':
            $user->setName($_POST['name']);
            $user->saveToDB($conn);
            echo 'Zmieniono nazwę na' . $_POST['name'];
            break;
        case 'password':
            if (strlen($_POST['password']) >= 6) {
                $user->setPassword($_POST['password']);
                $user->saveToDB($conn);
            } else {
                echo 'Nieprawidłowe hasło musi mieć co najmniej 6 znaków';
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">MiniTweeti</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="user_page.php">Strona użytkownika</a></li>
                    <li><a href="meesagePanel.php">Wiadomości</a></li>
                    <li><a href="modify_user.php">Zmodyfikuj swoje dane</a></li>
                    <li><a href="logout.php">Wyloguj</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <h1> Witaj <?php echo User::loadUserById($conn, $_SESSION['userId'])->getName(); ?></h1>
            Możesz zmienić swoje dane używając poniższego formularza.
            Zmienić można tylko hasło lub nazwę użytkownika
            <form method="POST" action="#">
                <div class="form-group row">
                    <label for="name" class="col-2 col-form-label">Nazwa użytkownika</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="Type new Name" name="name">
                    </div>
                    <input type="hidden" name="submit" value="name">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <form method="POST" action="#">
                <div class="form-group row">
                    <label for="password" class="col-2 col-form-label">Password</label>
                    <div class="col-10">
                        <input class="form-control" type="password" placeholder="Type new password min 6 characters" name="password">
                    </div>
                </div>
                <input type="hidden" name="submit" value="password">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</body>
</html>












