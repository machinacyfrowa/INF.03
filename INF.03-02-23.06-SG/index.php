<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia szkolna</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hurtownia z najlepszymi cenami</h1>
    </header>
    <main>
        <div id="left">
            <h2>Nasze ceny</h2>
            <table>
                <!-- skrypt 1 -->
                <?php
                    $db = new mysqli('localhost', 'root', '', 'sklep');
                    $result = $db->query('SELECT nazwa, cena FROM `towary` LIMIT 4');
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['nazwa'] . '</td>'; 
                        echo '<td>' . $row['cena'] . '</td>';
                        echo '</tr>';
                    }
                    $db->close();
                ?>
            </table>
        </div>
        <div id="center">
            <h2>Koszt zakupów</h2>
            <form action="index.php" method="post">
                <label for="itemSelect">Wybierz artykuł:</label>
                <select name="itemSelect" id="itemSelect">
                    <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                    <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                    <option value="Cyrkiel">Cyrkiel</option>
                    <option value="Linijka 30 cm">Linijka 30 cm</option>
                </select>
                <br>
                <label for="numberInput">liczba sztuk:</label>
                <input type="number" name="numberInput" id="numberInput" 
                placeholder="<?php if(isset($_POST['numberInput'])) echo $_POST['numberInput'];?>">
                <br>
                <input type="submit" value="OBLICZ">
            </form>
            <!-- skrypt 2 -->
            <?php
            if(isset($_POST['numberInput'])) {
                //jeżeli jesteśmy tu to znaczy, że formularz został wysłany
                $item = $_POST['itemSelect'];
                $number = $_POST['numberInput'];
                $db = new mysqli('localhost', 'root', '', 'sklep');
                $sql = 'SELECT cena FROM `towary` WHERE nazwa = ?';
                //szykuje zapytanie 
                $query = $db->prepare($sql);
                //podstawiam wartość
                $query->bind_param('s', $item);
                //wykonuje zapytanie
                $query->execute();
                //pobieram wynik
                $result = $query->get_result();
                //pobieram wiersz - bez pętli bo będzie tylko jeden wiersz
                $row = $result->fetch_assoc();
                $price = $row['cena'];
                //liczenie kosztu
                $cost = $price * $number;
                echo "wartość zakupów: $cost";
                $db->close();
            }

            ?>
        </div>
        <div id="right">
            <h2>Kontakt</h2>
            <img src="zakupy.png" alt="hurtownia">
            <p>e-mail: <a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a></p>
        </div>
    </main>
    <footer>
        <h4>Witrynę wykonał: 00000000000</h4>
    </footer>
</body>
</html>