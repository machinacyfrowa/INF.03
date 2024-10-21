<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Biblioteka w Książkowicach Małych</h1>
    </header>
    <main>
        <div id="left">
            <h4>Dodaj czytelnika</h4>
            <form action="biblioteka.php" method="post">
                <label for="name">imię:</label>
                <input type="text" name="name" id="name"><br>
                <label for="lastName">nazwisko:</label>
                <input type="text" name="lastName" id="lastName"><br>
                <label for="symbol">symbol:</label>
                <input type="number" name="symbol" id="symbol"><br>
                <input type="submit" value="AKCEPTUJ">
            </form>
            <!-- skrypt 1 -->
            <?php
            if(isset($_POST['name']) && isset($_POST['lastName']) && isset($_POST['symbol'])) {
                //dopiero teraz wiemy, że formularz został wysłany 
                //i możemy przetwarzać dane
                $firstName = $_POST['name'];
                $lastName = $_POST['lastName'];
                $symbol = $_POST['symbol'];
                $db = new mysqli("localhost", "root", "", "biblioteka");
                $sql = "INSERT INTO czytelnicy 
                        (imie, nazwisko, kod) 
                        VALUES (?, ?, ?)";
                $query = $db->prepare($sql);
                $query->bind_param("ssi", $firstName, $lastName, $symbol);
                
                if($query->execute()) {
                    //zapytanie sie udało - wypisz komunikat
                    echo "<p>Dodano czytelnika: $firstName $lastName</p>";
                }
                
                $db->close();
            }
            ?>
        </div>
        <div id="center">   
            <img src="biblioteka.png" alt="biblioteka">
            <h6>ul. Czytelników&nbsp;15; Książkowice Małe</h6>
            <a href="mailto:biuro@bib.pl"><p>Czy masz jakieś uwagi?</p></a>
        </div>
        <div id="right">
            <h4>Nasi czytelnicy:</h4>
            <ol>
            <!-- skrypt 2-->
            <?php
            $db = new mysqli("localhost", "root", "", "biblioteka");
            $sql = "SELECT imie, nazwisko FROM `czytelnicy` ORDER BY nazwisko ASC";
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
    </main>
    <footer>
        <p>Projekt witryny: 00000000000</p>
    </footer>
</body>
</html>