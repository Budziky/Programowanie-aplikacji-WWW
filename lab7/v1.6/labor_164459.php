<html>
<head>
    <title>Formularz Testowy</title>
</head>
<body>
    <form action="labor_164459.php" method="get">
        Szukaj: <input type="text" name="search"><br>
        <input type="submit" name="submitGet" value="GET">
    </form>
    <form action="labor_164459.php" method="post">
        Imię: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" name="submitPost" value="POST">
    </form>
</body>
</html>

<?php
$nr_indeksu = '164459';
$nrGrupy = '1';

echo 'Miłosz '.$nr_indeksu.' grupa '.$nrGrupy.'<br/><br/>';

// a
echo 'Zastosowanie metody include(): <br/>';
include ('vars.php');
echo "A $color $fruit <br/>";

echo 'Zastosowanie metody require_once(): <br/>';
$req_once = require_once("vars.php");
echo "Require_once: ".$req_once.'<br/>';

// b
$liczba = 10;

if ($liczba > 10) {
    echo "Liczba jest większa niż 10";
} elseif ($liczba == 10) {
    echo "Liczba jest równa 10";
} else {
    echo "Liczba jest mniejsza niż 10";
}

echo '<br>';

$dzien = "Wtorek";

switch ($dzien) {
    case "Poniedziałek":
        echo "Dzisiaj jest poniedziałek";
        break;
    case "Wtorek":
        echo "Dzisiaj jest wtorek";
        break;
    default:
        echo "Inny dzień tygodnia";
}
echo '<br>';

// c
$i = 0;

while ($i < 5) {
    echo "[While] Wartość i: $i<br>";
    $i++;
}

for ($j = 0; $j < 5; $j++) {
    echo "[For] Wartość j: $j<br>";
}

// d

// GET
if (isset($_GET['submitGet'])) {
    echo "Szukana fraza (GET): " . htmlspecialchars($_GET['search']) . "<br>";
}

// POST
if (isset($_POST['submitPost'])) {
    // Przechowywanie danych w sesji
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];

    echo "Imię (POST): " . htmlspecialchars($_SESSION['name']) . "<br>";
    echo "Email (POST): " . htmlspecialchars($_SESSION['email']) . "<br>";
}

// SESSION
if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
    echo "<h2>Informacje z sesji:</h2>";
    echo "Imię: " . htmlspecialchars($_SESSION['name']) . "<br>";
    echo "Email: " . htmlspecialchars($_SESSION['email']) . "<br>";
}
?>