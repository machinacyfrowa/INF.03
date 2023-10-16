<?php
echo "Dodano rezerwację do bazy";

$db = mysqli_connect("localhost", "root", "", "baza");

$date = $_POST['date'];
$personCount = $_POST['personCount'];
$phone = $_POST['phone'];


$q = "INSERT INTO `rezerwacje` (`id`, `nr_stolika`, `data_rez`, `liczba_osob`, `telefon`) 
            VALUES (NULL, '1', '$date', '$personCount', '$phone');";

mysqli_query($db,$q);

mysqli_close($db);
?>