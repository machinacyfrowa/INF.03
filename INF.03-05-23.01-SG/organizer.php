<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>
    <header>
        <div id="left">
            <h1>Organizer: SIERPIEŃ</h1>
        </div>
        <div id="center">
            <form action="organizer.php" method="post">
                <label for="eventInput">Zapisz wydarzenie:</label>
                <input type="text" name="event" id="eventInput">
                <input type="submit" value="OK">
            </form>
        </div>
        <div id="right">
            <img src="logo2.png" alt="sierpień">
        </div>
    </header>
    <main>
        <!-- skrypt 1 -->
         <?php
            $db = new mysqli('localhost', 'root', '', 'kalendarz');
            //sprawdzamy czy formularz wysłał dane
            if(isset($_POST['event'])) {
                $event = $_POST['event'];
                $sql = "UPDATE zadania 
                            SET wpis = '$event' 
                            WHERE dataZadania = '2020-08-09'";
                $db->query($sql);
            }
            //wyświetlanie kalendarza
            $sql = "SELECT dataZadania,wpis FROM zadania WHERE miesiac = 'sierpien'";
            //pobierz wynik do zmiennej $result
            $result = $db->query($sql);
            //wyświetl dane z bazy - standardowa pętla while
            while($row = $result->fetch_assoc()) {
                $dataZadania = $row['dataZadania'];
                $wpis = $row['wpis'];
                echo '<div class="event">';
                echo "<h2>$dataZadania</h2>";
                echo "<p>$wpis</p>";
                echo '</div>';
            }
            $db->close();
         ?>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>

</html>