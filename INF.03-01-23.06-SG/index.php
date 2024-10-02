<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </header>
    <div id="columnContainer">
        <aside id="left">
            <h2>Taniej o 30%</h2>
            <!-- skrypt 1 -->
            <ol>
                <?php
                $db = new mysqli('localhost', 'root', '', 'sklep');
                $q = "SELECT nazwa FROM `towary` WHERE promocja=1;";
                $result = $db->query($q);
                while ($row = $result->fetch_assoc()) {
                    $name = $row['nazwa'];
                    echo '<li>' . $name . '</li>';
                }
                $db->close();
                ?>
            </ol>
        </aside>
        <main>
            <h2>Sprawdź cenę</h2>
            <form action="index.php" method="post">
                <select name="itemSelect">
                    <option value="Gumka do mazania">Gumka do mazania</option>
                    <option value="Cienkopis">Cienkopis</option>
                    <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                    <option value="Markery 4 szt.">Markery 4 szt.</option>
                </select>
                <input type="submit" value="SPRAWDŹ">
            </form>
            <p>
                <!-- skrypt 2 -->
                <?php
                //skrypt uruchamia się wyłączenie jeśli otrzymaliśmy dane z formularza
                if (isset($_POST['itemSelect'])) {


                    $db = new mysqli('localhost', 'root', '', 'sklep');
                    $q = "SELECT cena FROM `towary` WHERE nazwa=?";


                    //nazwa wybrana w select
                    $name = $_POST['itemSelect'];


                    //przygotuj prepared query
                    $query = $db->prepare($q);
                    //podstaw za znak zapytania _s_tring ze zmiennej $name
                    $query->bind_param("s", $name);

                    //wykonaj kwerende - zwraca true/false
                    $query->execute();
                    //zapisz wynik do $result
                    $result = $query->get_result();

                    //nie robie pętli - spodziewam się jednej wartości
                    $row = $result->fetch_assoc();
                    $price = $row['cena']; //zawiera cenę z bazy danych
                    $discountPrice = $price * 0.7; //70% lub taniej o 30%

                    $outputBuffer = "";
                    $outputBuffer .= "cena regularna: ";
                    $outputBuffer .= $price;
                    $outputBuffer .= "<br>";
                    $outputBuffer .= "cena w promocji: ";
                    $outputBuffer .= $discountPrice;

                    echo  $outputBuffer;

                    $db->close();
                }
                ?>
            </p>
        </main>
        <aside id="right">
            <h2>Kontakt</h2>
            <p>email: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
            <img src="promocja.png" alt="promocja">
        </aside>
    </div>
    <footer>
        <h4>Autor strony: 00000000000</h4>
    </footer>
</body>

</html>