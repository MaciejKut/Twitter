<?php
require_once 'src/Tweet.php';
require_once 'src/User.php';
require_once 'connection.php';

session_start();

if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id']) {
    $id = (string) $_GET['id'];
} else {
    echo 'Nie dostałem id postu do wyświetlenia';
    header('Location: index.php');
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
                    <li><a href="modify_user.php">Wyloguj</a></li>
                    <li><a href="logout.php">Wyloguj</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <h1> Witaj <?php echo User::loadUserById($conn, $_SESSION['userId'])->getName(); ?></h1>
            <?php
            $post = Tweet::loadTweetById($conn, $id);
            $postAuthor = User::loadUserById($conn, $post->getUserId());
            ?>

            <!--            <form action="#" method="POST">
                            <label>Napisz co Ci chodzi po głowie:</label>
                            <textarea class="form-control" name="newTweet" rows="3" placeholder="Max lenght 144 signs. 
                                      Type something interesting" maxlength="144"></textarea>
                            <input type="submit">
                        </form>-->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Post text</th>
                        <th>Post author</th>
                        <th>Creation Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php echo $post->getText(); ?></td>
                        <td><?php echo $postAuthor->getName(); ?></td>
                        <td><?php echo $post->getCreationDate(); ?></td>
                    </tr>

                    <tr>
                        <th scope="row">Comments</th>
                        <td colspan="3">Tutaj wrzucimy komentarze albo następna tabelkę</td>
                        
                    </tr>
                </tbody>
            </table>

        </div>


    </body>
</html>

