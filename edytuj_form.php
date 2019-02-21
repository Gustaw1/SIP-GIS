<?php
ob_start();


?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="head_container">
        <br />
        <b>Edytuj dane stacji:</b>
        <br />

        <?php

          $id=$_POST['id'];

        require_once "dbconnect.php";

        //Umozliwienie odwolaa do zmiennych globalnych.
        global $host, $baza, $uzytkownik, $haslo;

        //Nawiazanie polaczenia serwerem MySQL.
        $db_obj = new mysqli($host, $uzytkownik, $haslo, $baza);


        $rezultat=mysqli_query($db_obj, "SELECT stacje.siec, stacje.x, stacje.y, stacje.cena FROM stacje WHERE id='$id'");


        $row=mysqli_fetch_assoc($rezultat);
		$siec=$row['siec'];
		$x=$row['x'];
		$y=$row['y'];
		$cena=$row['cena'];


        echo<<<END

        <form action="edytuj.php" method="post">
            <table>
                <tr>
                    <td>
                        Siec
                    </td>
                    <td>
                        <input type="text" id="siec" name="siec" value="
END;
		echo $siec;

echo<<<END
"/>
                        <br />
                    </td>
                    <tr>
                        <td>
                            Longitude
                        </td>
                        <td>
                            <input type="text" id="x" name="x" value="
END;
		echo $x;

echo<<<END
"/>
                            <br />
                        </td>
                        <tr>
                            <td>
                                Latitude
                            </td>
                            <td>
                                <input type="text" id="y" name="y" value="
END;
		echo $y;

echo<<<END
"/>
                                <br />
                            </td>
                            <tr>
                                <td>
                                    Cena paliwa Pb95
                                </td>
                                <td>
                                    <input type="text" id="cena" name="cena" value="
END;
		echo $cena;

echo<<<END
"/>
                                    <br />
                                </td>
                            </tr>
            </table>


<input type="hidden" name="id" value="
END;
		echo $id;

		echo<<<END
">


            <input type="submit" id="edytuj" value="Edytuj" />

            <input type="button" id="edytuj" value="wstecz" onclick="javascript:history.back()" />

        </form>

END;

        ?>


    </div>
</body>
</html>