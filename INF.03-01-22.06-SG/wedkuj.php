<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <?php
     $db = new mysqli('localhost', 'root', '', 'wedkowanie');
    ?>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <main>
        <div id="left">
            <div id="list">
                <h3>Ryby zamieszkujące rzeki</h3>
                <ol>
                    <?php
                    $q = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM `ryby` LEFT JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3";
                    $result = $db->query($q);
                    while($row = $result->fetch_assoc()){
                        /*
                        echo "<li>";
                        echo $row['nazwa'];
                        echo " pływa w rzece ";
                        echo $row['akwen'];
                        echo ", ";
                        echo $row['wojewodztwo'];
                        echo "</li>";
                        */
                        $n = $row['nazwa'];
                        $a = $row['akwen'];
                        $w = $row['wojewodztwo'];

                        echo "<li>$n pływa w rzece $a, $w</li>";
                    }
                    ?>
                    <!-- MOCKUP
                    <li>Szczupak pływa w rzece Warta-Obrzycko, Wielkopolskie</li>
                    <li>Leszcz pływa w rzece Przemsza k. Okradzinowa, Slaskie</li>
                    MOCKUP -->
                </ol>
            </div>
            <div id="table">
                <h3>Ryby drapieżne naszych wód</h3>
                <table>
                    
                    <tr>
                        <th>L.p.</th>
                        <th>Gatunek</th>
                        <th>Występowanie</th>
                    </tr>
                    <!-- MOCKUP
                    <tr>
                        <td>1</td>
                        <td>Szczupak</td>
                        <td>stawy, rzeki</td>
                    </tr>
                    MOCKUP -->
                    <?php
                    $q = "SELECT id, nazwa, wystepowanie FROM `ryby` WHERE styl_zycia = 1";
                    $result = $db->query($q);
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $n = $row['nazwa'];
                        $w = $row['wystepowanie'];
                        echo "<tr><td>$id</td><td>$n</td><td>$w</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
        <div id="right">
            <img src="ryba1.jpg" alt="Sum"><br>
            <a href="kwerendy.txt">Pobierz kwerendy</a>
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
    <?php
     $db->close();
    ?>
</body>
</html>