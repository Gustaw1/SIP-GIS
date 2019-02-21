<?php
ob_start();
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>MyPageTitle</title>
    <meta charset="utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php

	$id=$_POST['id'];
	$siec=$_POST['siec'];
	$x=$_POST['x'];
	$y=$_POST['y'];
	$cena=$_POST['cena'];


	// laczymy sie z baza danych
	require_once "dbconnect.php";

	//Umozliwienie odwolan do zmiennych globalnych.
	global $host, $baza, $uzytkownik, $haslo;

	//Nawiazanie polaczenia serwerem MySQL.
	$db_obj = new mysqli($host, $uzytkownik, $haslo, $baza);

	// Edytujemy rekord do bazy
	$ins=mysqli_query($db_obj, "UPDATE stacje SET siec='$siec', x='$x', y='$y', cena='$cena' WHERE stacje.id='$id'");

	if($ins)
	{
		header('Location: info.php');
		echo "Rekord zostal zmieniony poprawnie";
	}
	else echo "Blad nie udalo sie edytowac rekordu";

	mysqli_close($db_obj);


	ob_end_flush();
    ?>
</body>
</html>