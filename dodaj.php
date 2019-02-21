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
	$siec=$_POST['siec'];
	$x=$_POST['x'];
	$y=$_POST['y'];
	$cena=$_POST['cena'];

	if($siec and $x and $y and $cena) {

		// łączymy się z bazą danych
		require_once "dbconnect.php";

		//Umożliwienie odwołań do zmiennych globalnych.
		global $host, $baza, $uzytkownik, $haslo;

		//Nawiązanie połączenia serwerem MySQL.
		$db_obj = new mysqli($host, $uzytkownik, $haslo, $baza);

		// dodajemy rekord do bazy
		$ins=mysqli_query($db_obj, "INSERT INTO stacje SET siec='$siec', x='$x', y='$y', cena='$cena'");


		if($ins)
		{
			header('Location: info.php');
			echo "Rekord został dodany poprawnie";
		}
		else echo "Błąd nie udało się dodać nowego rekordu";

		mysqli_close($db_obj);
	}

	ob_end_flush();
    ?>
</body>
</html>