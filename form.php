<?php
if(isset($_SESSION['komunikat']))
    $komunikat = $_SESSION['komunikat'];
else
    $komunikat = "Wprowadź nazwę i hasło użytkownika:";
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Logowanie</title>
</head>
<body>

    <div id="container">
        <h3>
            <?php echo $komunikat; ?>
        </h3>

        <form action="login.php" method="post">

            <input type="text" name="user" placeholder="login" />
            <input type="password" name="haslo" placeholder="hasło" />
            <input type="submit" value="Zaloguj się" />
        </form>
    </div>

</body>
</html>
