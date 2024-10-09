<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </header>
    <main>
        <div id="left">
            <h3>Polecamy dzieła autorów:</h3>
            <ol>
                <!-- skrypt 1 -->
                <?php
                    $db = new mysqli('localhost', 'root', '', 'biblioteka');
                    $sql = "SELECT imie, nazwisko FROM `autorzy` ORDER BY `autorzy`.`nazwisko` ASC";
                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc()) {
                        $firstName = $row['imie'];
                        $lastName = $row['nazwisko'];
                        echo "<li>$firstName $lastName</li>";
                    }
                    $db->close();
                ?>
            </ol>
        </div>
        <div id="center">
            <h3>ul. Czytelnicza 25, Książkowice&nbsp;Wielkie</h3>
            <a href="mailto:sekretariat@biblioteka.pl"><p>Napisz do nas</p></a>
            <img src="biblioteka.png" alt="książki">
        </div>
        <div id="right">
            <div id="top">
                <h3>Dodaj czytelnika</h3>
                <form action="biblioteka.php" method="post">
                    <label for="firstName">imię:</label>
                    <input type="text" name="firstName" id="firstName"><br>
                    <label for="lastName">nazwisko:</label>
                    <input type="text" name="lastName" id="lastName"><br>
                    <label for="symbol">symbol:</label>
                    <input type="number" name="symbol" id="symbol"><br>
                    <input type="submit" value="DODAJ">
                </form>
            </div>
            <div id="bottom">
                <!-- skrypt 2 -->
                <?php
                if(isset($_POST['firstName'])) {
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $symbol = $_POST['symbol'];
                    $db = new mysqli('localhost', 'root', '', 'biblioteka');
                    $sql = "INSERT INTO `czytelnicy` (`id`, `imie`, `nazwisko`, `kod`) 
                                VALUES (NULL, ?, ?, ?)";
                    $query = $db->prepare($sql);
                    $query->bind_param('ssi', $firstName, $lastName, $symbol);
                    if($query->execute()) {
                        echo "Czytelnik $firstName $lastName dodany do bazy danych";
                    }
                    
                    $db->close();
                }
                ?>
            </div>
        </div>
    </main>
    <footer>
        <p>Projekt strony: 00000000000</p>
    </footer>
</body>
</html>