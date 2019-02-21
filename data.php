<?php

//geting data from db
require_once "dbconnect.php";
global $host, $baza, $uzytkownik, $haslo;
$db_obj = new mysqli($host, $uzytkownik, $haslo, $baza);



$result=mysqli_query($db_obj, "SELECT * FROM stacje");

//storin in array
$data=array();
while ($row= mysqli_fetch_assoc($result)){
    $data[]=$row;
}

//returnig responce in JSON format

echo json_encode($data);