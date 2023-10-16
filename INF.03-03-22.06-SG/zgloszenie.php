<?php
//przepisz do lokalnych zmiennych z $_POST
$lowisko = $_POST['lowisko'];
$data = $_POST['data'];
$sedzia = $_POST['sedzia'];

$db = mysqli_connect('localhost', 'root', '', 'wedkarstwo');
$q = "INSERT INTO `zawody_wedkarskie` (`id`, `Karty_wedkarskie_id`, `Lowisko_id`, `data_zawodow`, `sedzia`) 
        VALUES (NULL, 0, $lowisko, '$data', '$sedzia')";
mysqli_query($db, $q);
mysqli_close($db);
?>