<?php
ob_start();


?>

Jesteś zalogowany jako: <?php echo $_SESSION['zalogowany'] ?>
<br />
Pamiętaj o wylogowaniu przed opuszczeniem strony!
<br />
<br />
<a href="logout.php">Wylogowanie</a>

<br /><br /><a href="mapa_admin.php">Przejdź do edycji punktów na mapie</a>

<br />
<!-- Dostepne Rekordy -->

<br />
<br />
<b>Dostępne stacje:</b>
<br />
<br />

<?php

require_once "dbconnect.php";

//Umożliwienie odwołań do zmiennych globalnych.
global $host, $baza, $uzytkownik, $haslo;

//Nawiązanie połączenia serwerem MySQL.
$db_obj = new mysqli($host, $uzytkownik, $haslo, $baza);


$rezultat=mysqli_query($db_obj, "SELECT stacje.id, stacje.siec, stacje.x, stacje.y, stacje.cena FROM stacje");
$ile=mysqli_num_rows($rezultat);

if ($ile>=1)

{
	for ($i=1; $i <=$ile; $i++)
	{
		$row=mysqli_fetch_assoc($rezultat);
		$id=$row['id'];
		$a1=$row['siec'];
		$a2=$row['x'];
		$a3=$row['y'];
		$a4=$row['cena'];


		$variable = <<<END

			<b>$i.</b>
			$a1, Longitude=$a2, Latitude=$a3, Cena paliwa PB95=$a4 PLN
END;

		echo $variable;

		echo<<<END
<table><tr><td>
<form method="post" action="edytuj_form.php">
<input type="hidden" name="id" value="
END;
		echo $id;

		echo<<<END
">
<input type="submit" id="edytuj" value="Edytuj" />
</form></td><td>
<form method="post" action="usun.php">
 <input type="hidden" name="id" value="
END;
		echo $id;

		echo<<<END
">

<input type="submit" id="usun" value="Usuń" />
</form></tr></table>


<br />


END;

	}
}

?>

<html>
<body>
	<br />
	<b>Dodaj nową stacje:</b>
	<br />

	<form action="dodaj.php" method="post">
		<table>
			<tr>
				<td>
					Siec
				</td>
				<td>
					<input type="text" id="siec" name="siec" />
					<br />
				</td>
				<tr>
					<td>
						Longitude
					</td>
					<td>
						<input type="text" id="x" name="x" />
						<br />
					</td>
					<tr>
						<td>
							Latitude
						</td>
						<td>
							<input type="text" id="y" name="y" />
							<br />
						</td>
						<tr>
							<td>
								Cena paliwa Pb95
							</td>
							<td>
								<input type="text" id="cena" name="cena" />
								<br />
							</td>
						</tr>
		</table>
		<input type="submit" id="dodaj" value="Dodaj" />
	</form>
</body>
</html>