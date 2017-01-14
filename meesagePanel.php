<?php
require_once 'src/Tweet.php';
require_once 'src/User.php';
require_once 'src/Meesages.php';
require_once 'connection.php';

session_start();

if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['newMeesage']) {
    $mail = $_POST['newMeesage'];
    $email = $_POST['reciver'];
    $reciver = User::loadUserByEmail($conn, $email);

    if (strlen($mail) > 0 AND strlen($mail) < 255) {
        $newMeesageToDB = new Meesages();
        $newMeesageToDB->setReciver($reciver->getId());
        $newMeesageToDB->setSender($_SESSION['userId']);
        $newMeesageToDB->setText($_POST['newMeesage']);
        $newMeesageToDB->setCreation_date(date('Y-m-d G:i:s'));
        $newMeesageToDB->setMeesage_subject($_POST['meesage_subject']);
        $newMeesageToDB->saveToDB($conn);
    } else {
        echo 'Maksymalna długość wiadomośc to 255 znaków';
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
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="user_page.php">Strona użytkownika</a></li>
                    <li><a href="meesagePanel.php">Wiadomości</a></li>
                    <li><a href="logout.php">Wyloguj</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <h1> Witaj <?php echo User::loadUserById($conn, $_SESSION['userId'])->getName(); ?></h1>


            <form action="#" method="POST">
                <label for="reciver">Adres email odbiorcy</label>
                <input type="text" name="reciver">
                <br><label for='meesage_subject'>Tytuł wiadomości</label>
                <input type="text" name="meesage_subject">
                <br><label>Treść wiadomości</label>
                <br>
                <textarea class="form-control" name="newMeesage" rows="3" placeholder="Type here" maxlength="255"></textarea>
                <br>
                <input type="submit" value="Wyślij wiadomość">
            </form>

            <h2 class="sub-header">Section title</h2>
            <div class="table-responsive">
                Wiadomości otrzymane
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Od:</th>
                            <th>Temat</th>
                            <th>Wysłana dnia:</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $allMeesages = Meesages::loadAllMeesagesByUserId($conn, $_SESSION['userId']);
                        foreach ($allMeesages as $value) {

                            echo '<tr>';
                            echo "<td>" . User::loadUserById($conn, $value->getSender())->getName() . "</td>";
                            echo "<td>" . $value->getMeesage_subject() . "</td>";
                            echo "<td>" . $value->getCreation_date();
                            echo '<br><a href="meesageDetails.php?id=' . $value->getId() . '&read=1">Zobacz wiadomość</a>';
                            echo '</td>';
                            echo '<td>';
                            switch ($value->getStatus()) {
                                case 0:
                                    echo 'Nie przeczytana';

                                    break;
                                case 1:
                                    echo 'Przeczytana';

                                    break;

                                default:
                                    break;
                            }
                            
                            
                            
                            echo '</td></tr>';
                        }
                        ?>

                    </tbody>
                </table>
                Wiadomości Wysłane:
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Odbiorca wiadomości:</th>
                            <th>Temat wiadomości</th>
                            <th>Wysłana dnia:</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $allMeesagesSent = Meesages::loadAllMeesagesSentBySenderId($conn, $_SESSION['userId']);
                        foreach ($allMeesagesSent as $value) {

                            echo '<tr>';
                            echo "<td>" . User::loadUserById($conn, $value->getReciver())->getName() . "</td>";
                            echo '<td>' . $value->getMeesage_subject() . '<td>';
                            echo "<td>" . $value->getCreation_date();
                            echo '<br><a href="meesageDetails.php?id=' . $value->getId() . '">Zobacz wiadomość</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>


    </body>
</html>