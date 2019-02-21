<?php
session_start();
if(!isset($_SESSION['zalogowany'])){
    $_SESSION['komunikat'] =
     "Nie jesteś zalogowany!";
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Projekt SIP - panel administracyjny</title>
</head>
<body>

    <div id="head_container">
        <?php

        include 'zawartosc.php';

        ?>
    </div>
</body>
</html>
