<?php
session_start();
include('../cfg.php');
$link = new mysqli('localhost', 'root', '', 'moja_strona');

function dodajDoKoszyka($produktId, $ilosc) {
    global $link;

    $query = "SELECT tytul, cena_netto, ilosc_dostepnych_sztuk FROM produkt WHERE id = $produktId";
    $result = mysqli_query($link, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        if ($row['ilosc_dostepnych_sztuk'] >= $ilosc) {
            if (isset($_SESSION['koszyk'][$produktId])) {
                $_SESSION['koszyk'][$produktId]['ilosc'] += $ilosc;
            } else {
                $_SESSION['koszyk'][$produktId] = [
                    'nazwa' => $row['tytul'],
                    'cena' => $row['cena_netto'],
                    'ilosc' => $ilosc
                ];
            }

            $nowaIlosc = $row['ilosc_dostepnych_sztuk'] - $ilosc;
            $updateQuery = "UPDATE produkt SET ilosc_dostepnych_sztuk = $nowaIlosc WHERE id = $produktId";
            mysqli_query($link, $updateQuery);

            echo "Produkt został dodany do koszyka.";
        } else {
            echo "Niewystarczająca ilość produktu w magazynie.";
        }
    } else {
        echo "Produkt nie został znaleziony.";
    }
}

function usunZKoszyka($produktId, $ilosc) {
    global $link;

    if (isset($_SESSION['koszyk'][$produktId])) {
        if ($_SESSION['koszyk'][$produktId]['ilosc'] > $ilosc) {
            $_SESSION['koszyk'][$produktId]['ilosc'] -= $ilosc;
            echo "Ilość produktu w koszyku została zaktualizowana.";
        } else {
            unset($_SESSION['koszyk'][$produktId]);
            echo "Produkt został usunięty z koszyka.";
        }

        $query = "UPDATE produkt SET ilosc_dostepnych_sztuk = ilosc_dostepnych_sztuk + $ilosc WHERE id = $produktId";
        mysqli_query($link, $query);
    } else {
        echo "Produkt nie znajduje się w koszyku.";
    }
}

function zliczWartoscKoszyka() {
    $total = 0.0;

    if (isset($_SESSION['koszyk']) && is_array($_SESSION['koszyk'])) {
        foreach ($_SESSION['koszyk'] as $produktId => $item) {
            $total += $item['cena'] * $item['ilosc'];
        }
    }

    return $total;
}

$produkty = [];
$query = "SELECT id, tytul FROM produkt";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $produkty[$row['id']] = $row['tytul'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produktId = $_POST['produktId'];
    $ilosc = intval($_POST['ilosc']);

    if (isset($_POST['dodaj'])) {
        dodajDoKoszyka($produktId, $ilosc);
    } elseif (isset($_POST['usun'])) {
        usunZKoszyka($produktId, $ilosc);
    }
    if (isset($_POST['kup'])) {
        $_SESSION['koszyk'] = [];  // Wyczyszczenie koszyka
        echo "<p>Dziękujemy za zakup!</p>";
    }
}

$totalKoszyka = zliczWartoscKoszyka();

$query = "SELECT id, tytul, cena_netto, ilosc_dostepnych_sztuk FROM produkt";
$result = mysqli_query($link, $query);

echo "<h2>Lista produktów:</h2>";
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nazwa</th><th>Cena Netto</th><th>Ilość Dostępnych Sztuk</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['tytul']) . "</td>";
        echo "<td>" . number_format($row['cena_netto'], 2) . " PLN</td>";
        echo "<td>" . $row['ilosc_dostepnych_sztuk'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Brak produktów w bazie danych.</p>";
}
?>

<form method="post">
    <h2>Zarządzaj koszykiem</h2>

    <label for="produktId">Produkt:</label>
    <select name="produktId">
        <?php foreach ($produkty as $id => $tytul): ?>
            <option value="<?php echo htmlspecialchars($id); ?>">
                <?php echo htmlspecialchars($tytul); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="ilosc">Ilość:</label>
    <input type="number" name="ilosc" min="1" value="1"><br>

    <input type="submit" name="dodaj" value="Dodaj do koszyka">
    <input type="submit" name="usun" value="Usuń z koszyka">
    <input type="submit" name="kup" value="Kup">
</form>
<?php
// Sprawdzenie, czy koszyk istnieje i zawiera produkty
if (isset($_SESSION['koszyk']) && count($_SESSION['koszyk']) > 0) {
    echo "<h3>Zawartość koszyka:</h3>";
    echo "<ul>";

    foreach ($_SESSION['koszyk'] as $produktId => $item) {
        echo "<li>";
        echo "Produkt: " . htmlspecialchars($item['nazwa']) . "<br>";
        echo "Cena: " . number_format($item['cena'], 2) . " PLN<br>";
        echo "Ilość: " . $item['ilosc'];
        echo "</li>";
    }

    echo "</ul>";
} else {
    echo "<p>Koszyk jest pusty.</p>";
}
?>
<h3>Łączna wartość koszyka: <?php echo number_format($totalKoszyka, 2); ?> PLN</h3>


