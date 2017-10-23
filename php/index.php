<?php
include "../includes/declaration.php";
//include "../vendor/autoload.php";

?>
<html>
<head>
    <!-- made by Menno & Tycho -->
    <title>Jukebox</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../icon.png" sizes="16x16"/>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/7cc896295d.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/ajax.js"></script>
</head>
<body>
<?php
messages();
if ($_SERVER['HTTP_HOST'] == 'www.tychoengberink.nl' || $_SERVER['HTTP_HOST'] == 'tychoengberink.nl') {
    if (!isset($_SESSION['user'])) {
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
                $email = mysqli_escape_string(Database::$connection, $_GET['email']);
                $hash = mysqli_escape_string(Database::$connection, $_GET['hash']);
                $check = Database::select(sprintf("SELECT email, hash, active FROM user WHERE email='%s' AND hash='%s' AND active='0'", $email, $hash));
                if ($check) {
                    if ($check[0]->email == '' || $check[0]->hash == '') {
                        $_SESSION['message'] = 'Niet toe gestaande benadering';
                    } else {
                        Database::update('user', array('active' => 1), 'email', sprintf("'%s'", $email));
                        include "login.php";
                        $_SESSION['message'] = 'Account is geactiveerd!';
                    }
                } else {
                    $_SESSION['message'] = 'Niet toe gestaande benadering';
                }

            } else {
                include "register.php";
            }
        } else {
            include "login.php";
            if (isset($_SESSION['login'])) {
                unset($_SESSION['login']);
            }
        }
    } else {
        include "navigator.php";
        echo PHP_EOL;
        echo "<div class='result'></div>";
        if (isset($_POST['target'])) {
            switch ($_POST['target']) {
                case "login":
                    include "playlistPage.php";
                    break;
                case "search":
                    include "search.php";
                    break;
                case "playlist":
                    include "playlistPage.php";
                    break;
                case "logout":
                    session_unset();
                    header("location:index.php");
                    $_SESSION['message'] = 'U bent succesvol uitgelogd';
                    break;
            }
        }
    }
} else {
    echo '<h1>Om optimaal gebruikt te maken van deze site ga naar www.tychoengberink.nl in uw browser</h1>';
}
?>
</body>
<!-- made by Menno & Tycho -->
</html>