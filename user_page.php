<?php 
require_once 'src/Tweet.php';
require_once 'src/User.php';
require_once 'connection.php';

session_start();

if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
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

            <h1> Witaj <?php echo User::loadUserById($conn, $_SESSION['userId'])->getName();?></h1>
            
            <?php
            $allTweets = Tweet::loadAllTweetByUserId($conn, $_SESSION['userId']);
            ?>

            <h2 class="sub-header">Twoje tweety</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Treść tweeta</th>
                            <th>Użytkownik</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allTweets as $value) {
                            echo '<tr>';
                            echo "<td>" . $value->getId() . "</td>";
                            echo "<td>" . $value->getText() . "</td>";
                            echo "<td>" . User::returnUserNameById($conn, $value->getUserId());
                            echo '<br><a href="post.php?id='.$value->getId() .'">Wyświetl post</a>';
                            echo '</td>';
                            echo "<td>" . $value->getCreationDate() . "</td>";
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>


    </body>
</html>
