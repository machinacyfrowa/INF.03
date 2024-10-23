<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <h1>Pensjonat pod dobrym humorem</h1>
    </header>
    <main>
        <div id="left">
            <a href="index.html">GŁÓWNA</a>
            <img src="1.jpg" alt="pokoje">
        </div>
        <div id="center">
            <a href="cennik.php">CENNIK</a>
            <table>
                <!-- skrypt 1-->
                 <?php
                 $db = new mysqli('localhost', 'root', '', 'wynajem');
                 $sql = "SELECT * FROM pokoje";
                 $result = $db->query($sql);
                 while($row = $result->fetch_assoc()){
                     $id = $row['id'];
                     $nazwa = $row['nazwa'];
                     $cena = $row['cena'];
                     echo "<tr>";
                        echo "<td>$id</td><td>$nazwa</td><td>$cena</td>";
                     echo "</tr>";
                 }
                 $db->close();
                 ?>
            </table>
        </div>
        <div id="right">
            <a href="kalkulator.html">KALKULATOR</a>
            <img src="3.jpg" alt="pokoje">
        </div>

    </main>
    <footer>
        <p>Stronę opracował: 00000000000</p>
    </footer>
</body>
</html>