<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <img id="backgroundPicture" src="motor.png" alt="motocykl">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <main>
        <article>
            <h2>Gdzie pojechać?</h2>
            <dl>
                <?php
                $db = new mysqli('localhost', 'root', '', 'motory');
                $sql = "SELECT wycieczki.nazwa, wycieczki.opis, 
                                    wycieczki.poczatek, zdjecia.zrodlo 
                                    FROM wycieczki 
                                    LEFT JOIN zdjecia on wycieczki.zdjecia_id = zdjecia.id;";
                $result = $db->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $nazwa = $row['nazwa'];
                    $opis = $row['opis'];
                    $poczatek = $row['poczatek'];
                    $zrodlo = $row['zrodlo'];
                    echo "<dt>$nazwa rozpoczyna się w $poczatek, <a href=\"$zrodlo.jpg\">zobacz zdjęcie</a></dt>";
                    echo "<dd>$opis</dd>";
                }
                $db->close();
                ?>
            </dl>
        </article>

        <section>
            <h2>Co kupić?</h2>
            <ol>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>Honda VFR800i</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ol>
        </section>
        <section>
            <h2>Statystyki</h2>
            <p>Wpisanych wycieczek:
                <!--skrypt 2-->
                <?php
                $db = new mysqli('localhost', 'root', '', 'motory');
                $sql = "SELECT COUNT(*) FROM wycieczki";
                $result = $db->query($sql);
                $row = $result->fetch_row();
                $count = $row[0];
                echo $count;
                $db->close();
                ?>
            </p>
            <p>Użytkowników forum: 200</p>
            <p>Przesłanych zdjęć: 1300</p>
        </section>

    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>

</html>