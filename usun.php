<?php
ob_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php

	$id=$_POST['id'];

	if($id) {

		// laczymy sie z baza danych
		require_once "dbconnect.php";

		//Umozliwienie odwolan do zmiennych globalnych.
		global $host, $baza, $uzytkownik, $haslo;

		//Nawiazanie polaczenia serwerem MySQL.
		$db_obj = new mysqli($host, $uzytkownik, $haslo, $baza);

		// usuwamy rekord do bazy
		$del=mysqli_query($db_obj, "DELETE FROM stacje WHERE id='$id'");

		if($del)
		{
			header('Location: admin.php');
			echo "Rekord zostal usuniety poprawnie";
		}
		else echo "Blad nie udalo sie usunac rekordu";

		mysqli_close($db_obj);
	}

	ob_end_flush();
	?>
</body>
</html>