<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>Grupa Polskich Kwiaciarni</h1>
    </header>
    <main>
        <div id="left">
            <h2>Menu</h2>
            <ol>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="http://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a></li>
                <li>
                    <a href="znajdz.php">Znajdź kwiaciarnię</a>
                    <ul>
                        <li>w Warszawie</li>
                        <li>w Malborku</li>
                        <li>w Poznaniu</li>
                    </ul>
                </li>
            </ol>
        </div>
        <div id="right">
            <h2>Znajdź kwiaciarnię</h2>
            <form action="znajdz.php" method="post">
                <label for="miasto">Podaj nazwę miasta:</label>
                <input type="text" name="miasto" id="miasto">
                <input type="submit" value="SPRAWDŹ">
            </form>
            <?php
            if(isset($_POST['miasto'])) {
                $db =  new mysqli('localhost', 'root', '', 'kwiaciarnia');
                $sql = "SELECT nazwa, ulica FROM `kwiaciarnie` WHERE miasto = ?";
                $query = $db->prepare($sql);
                $miasto = $_POST['miasto'];
                $query->bind_param('s', $miasto);   
                $query->execute();
                $result = $query->get_result();
                if($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $nazwa = $row['nazwa'];
                    $ulica = $row['ulica'];
                    echo "<h3>$nazwa, $ulica</h3>";
                }
                $db->close();
            }
            ?>
        </div>
    </main>
    <footer>
        <p>Stronę opracował: 00000000000</p>
    </footer>
</body>
</html>