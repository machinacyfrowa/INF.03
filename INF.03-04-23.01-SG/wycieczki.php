<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>
    <div id="list">
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <!-- skrypt 1 -->
        <ul>
        <?php
        $db = new mysqli('localhost', 'root', '', 'biuro');
        $sql = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()) {
            echo "<li>";
            $id = $row['id'];
            $data = $row['dataWyjazdu'];
            $cel = $row['cel'];
            $cena = $row['cena'];
            echo "$id. dnia $data do $cel, cena: $cena";
            echo "</li>";
        }
        $db->close();
        ?>
        </ul>
    </div>
    <main>
        <div id="left">
            <h2>Bestselery</h2>
            <table>
                <tr>
                    <td>Wenecja</td>
                    <td>kwiecień</td>
                </tr>
                <tr>
                    <td>Londyn</td>
                    <td>lipiec</td>
                </tr>
                <tr>
                    <td>Rzym</td>
                    <td>wrzesień</td>
                </tr>
            </table>
        </div>
        <div id="center">
            <h2>Nasze zdjęcia</h2>
            <!-- skrypt 2 -->
            <?php
            $db = new mysqli('localhost', 'root', '', 'biuro');
            $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis DESC";
            $result = $db->query($sql);
            while($row = $result->fetch_assoc()) {
                $nazwa = $row['nazwaPliku'];
                $podpis = $row['podpis'];
                //echo '<img src="'.$nazwa.'" alt="'.$podpis.'">';
                echo "<img src=\"$nazwa\" alt=\"$podpis\">";
            }
            $db->close();
            ?>
        </div>
        <div id="right">
            <h2>Skontaktuj się</h2>
            <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
            <p>telefon: 111222333</p>
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>