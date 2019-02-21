<?php
session_start();
if(!isset($_SESSION['zalogowany'])){
    $komunikat = "Nie jesteś zalogowany!";
}
else{
    unset($_SESSION['zalogowany']);
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time() - 3600);
    }
    $komunikat = "Wylogowanie prawidłowe!";
}
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Wylogowanie</title>
</head>
<body>
    <?php echo $komunikat ?>
    <br />
    <br />
    <a href="login.php">Powrót do strony logowania</a>
</body>
</html>
