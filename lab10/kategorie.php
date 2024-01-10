<!-- Formularz do zarządzania kategoriami -->
<form method="post" action="kategorie.php">
    <input type="text" name="nazwa" placeholder="Nazwa kategorii">
    <select name="akcja">
        <option value="dodaj">Dodaj Kategorię</option>
        <option value="usun">Usuń Kategorię</option>
        <option value="edytuj">Edytuj Kategorię</option>
        <option value="pokaz">Pokaż Kategorie</option>
    </select>
    <input type="submit" value="Wykonaj">
</form>


<!-- Tutaj wyświetlaj kategorie z przyciskami edycji i usuwania -->
<?php
include 'cfg.php';

$link = mysqli_connect("localhost", "root", "", "kategorie");
if (!$link) {
    die("Błąd połączenia: " . mysqli_connect_error());
}


function DodajKategorie($nazwa, $matka = 0) {
    global $link;

    $nazwa = mysqli_real_escape_string($link, $nazwa);
    $query = "INSERT INTO kategorie (nazwa, matka) VALUES ('$nazwa', $matka)";

    if (mysqli_query($link, $query)) {
        echo "Kategoria została dodana.";
    } else {
        echo "Błąd: " . mysqli_error($link);
    }
}


function UsunKategorie($id) {
    global $link;

    $id = intval($id);
    $query = "DELETE FROM kategorie WHERE id = $id LIMIT 1";

    if (mysqli_query($link, $query)) {
        echo "Kategoria została usunięta.";
    } else {
        echo "Błąd: " . mysqli_error($link);
    }
}

function EdytujKategorie($id, $nowaNazwa, $nowaMatka) {
    global $link;

    $nowaNazwa = mysqli_real_escape_string($link, $nowaNazwa);
    $id = intval($id);
    $nowaMatka = intval($nowaMatka);
    $query = "UPDATE kategorie SET nazwa = '$nowaNazwa', matka = $nowaMatka WHERE id = $id LIMIT 1";

    if (mysqli_query($link, $query)) {
        echo "Kategoria została zaktualizowana.";
    } else {
        echo "Błąd: " . mysqli_error($link);
    }
}

function PokazKategorie() {
    global $link;

    $query = "SELECT * FROM kategorie WHERE matka = 0";
    $result = mysqli_query($link, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<b>" . $row['nazwa'] . "</b><br>";

        $queryPodkategorie = "SELECT * FROM kategorie WHERE matka = " . $row['id'];
        $resultPodkategorie = mysqli_query($link, $queryPodkategorie);

        while ($rowPodkategoria = mysqli_fetch_assoc($resultPodkategorie)) {
            echo "-- " . $rowPodkategoria['nazwa'] . "<br>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['akcja'])) {
    $akcja = $_POST['akcja'];
    $nazwa = isset($_POST['nazwa']) ? $_POST['nazwa'] : '';

    switch ($akcja) {
        case 'dodaj':
            DodajKategorie($nazwa);
            break;
        case 'usun':
            UsunKategorie($nazwa);
            break;
        case 'edytuj':
            // Logika edycji...
            break;
        case 'pokaz':
            PokazKategorie();
            break;
    }
}
?>