<?php
ob_start();
session_start();


if((isset($_SESSION['zalogowany']))&& ($_SESSION['zalogowany']==true))
{
	header('Location: admin.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <div id="container">

        <form action="login.php" method="post">

            <input type="text" name="login" placeholder="login" />
            <input type="password" name="password" placeholder="hasło" />
            <input type="submit" value="Zaloguj się" />
        </form>


        <?php
        if(isset($_SESSION['blad']))
            echo $_SESSION['blad'];
        ?>
        <br />
    </div>


</body>
</html>

<?php
ob_end_flush();
?>