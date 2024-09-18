<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
        <div id="logo">
            <img src="logo1.png" alt="lipiec">
        </div>
        <div id="title">
            <h1>TERMINARZ</h1>
            <p>najbliższe zadania: 
                <!-- skrypt1 -->
                 <?php
                 $db = new mysqli('localhost', 'root', '', 'terminarz');
                 $q = "SELECT DISTINCT wpis FROM `zadania` 
                            WHERE dataZadania >= '2020-07-01' 
                            AND dataZadania <= '2020-07-07' AND wpis != '';";
                 $result = $db->query($q);
                 $outputString = "";
                 while($row = $result->fetch_row()){
                    $outputString .=  $row[0]."; ";
                 }
                 echo $outputString;
                 $db->close();
                 ?>
            </p>
        </div>
    </header>
    <main>
    <!-- skrypt2 -->
    <?php
    $db = new mysqli('localhost', 'root', '', 'terminarz');
    $q = "SELECT dataZadania, wpis FROM `zadania` WHERE miesiac = 'lipiec';";
    $result = $db->query($q);
    /*
    <div>
    <h6>data</h6>
    <p>opis</p>
    </div>
    */
    $outputString = "";
    while($row = $result->fetch_assoc()) {
        $outputString .= '<div>';
        $outputString .= '<h6>'.$row['dataZadania'].'</h6>';
        $outputString .= '<p>'.$row['wpis'].'</p>';
        $outputString .= '</div>';
    }
    echo $outputString;
    $db->close();
    ?>
    </main>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>