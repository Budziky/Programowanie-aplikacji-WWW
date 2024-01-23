<form method="post" action="produkt.php">
    <select name="akcja">
        <option value="dodaj">Dodaj Produkt</option>
        <option value="usun">Usuń Produkt</option>
        <option value="edytuj">Edytuj Produkt</option>
        <option value="pokaz">Pokaż Produkty</option>
    </select><br><br>

    <input type="text" name="id" placeholder="ID Produktu (dla usuwania i edycji)"><br>
    <input type="text" name="tytul" placeholder="Tytuł"><br>
    <input type="text" name="opis" placeholder="Opis"><br>
    <input type="text" name="data_utworzenia" placeholder="Data produkcji"><br>
	<input type="text" name="cena_netto" placeholder="Cena netto"><br>
	<input type="text" name="podatek_vat" placeholder="Podatek vat"><br>
	<input type="text" name="ilosc_sztuk" placeholder="Ilość sztuk"><br>
	<input type="text" name="status_dostepnosci" placeholder="Status dostępności"><br>
	<input type="text" name="kategoria" placeholder="Kategoria"><br>
	<input type="text" name="gabaryt_produktu" placeholder="Gabaryt produktu"><br>
	<input type="text" name="zdjecie" placeholder="Zdjęcie"><br>
    <input type="submit" value="Wykonaj">
</form>

<?php
include 'cfg.php';

function DodajProdukt($tytul, $opis, $cenaNetto, $podatekVAT, $iloscSztuk, $statusDostepnosci, $kategoria, $gabarytProduktu, $zdjecie) {
    global $link;
    $query = "INSERT INTO produkty (tytul, opis, data_utworzenia, cena_netto, podatek_vat, ilosc_sztuk, status_dostepnosci, kategoria, gabaryt_produktu, zdjecie) VALUES ('$tytul', '$opis', NOW(), '$cenaNetto', '$podatekVAT', '$iloscSztuk', '$statusDostepnosci', '$kategoria', '$gabarytProduktu', '$zdjecie')";
    mysqli_query($link, $query);
    // Obsługa błędów i potwierdzenie
}

function UsunProdukt($id) {
    global $link;
    $query = "DELETE FROM produkty WHERE id = $id LIMIT 1";
    mysqli_query($link, $query);
    // Obsługa błędów i potwierdzenie
}

function EdytujProdukt($id, $tytul, $opis, $cenaNetto, $podatekVAT, $iloscSztuk, $statusDostepnosci, $kategoria, $gabarytProduktu, $zdjecie) {
    global $link;
    $query = "UPDATE produkty SET tytul = '$tytul', opis = '$opis', cena_netto = '$cenaNetto', podatek_vat = '$podatekVAT', ilosc_sztuk = '$iloscSztuk', status_dostepnosci = '$statusDostepnosci', kategoria = '$kategoria', gabaryt_produktu = '$gabarytProduktu', zdjecie = '$zdjecie' WHERE id = $id LIMIT 1";
    mysqli_query($link, $query);
    // Obsługa błędów i potwierdzenie
}

function PokazProdukty() {
    global $link;
    $query = "SELECT * FROM produkty";
    $result = mysqli_query($link, $query);

    if (!$result) {
        echo "Błąd podczas pobierania danych: " . mysqli_error($link);
        return;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Tytuł: " . htmlspecialchars($row['tytul']) . "<br>";
        echo "Opis: " . htmlspecialchars($row['opis']) . "<br>";
        echo "Data Utworzenia: " . $row['data_utworzenia'] . "<br>";
        echo "Data Modyfikacji: " . $row['data_modyfikacji'] . "<br>";
        echo "Data Wygaśnięcia: " . $row['data_wygasniecia'] . "<br>";
        echo "Cena Netto: " . $row['cena_netto'] . "<br>";
        echo "Podatek VAT: " . $row['podatek_vat'] . "<br>";
        echo "Ilość Sztuk: " . $row['ilosc_sztuk'] . "<br>";
        echo "Status Dostępności: " . htmlspecialchars($row['status_dostepnosci']) . "<br>";
        echo "Kategoria: " . htmlspecialchars($row['kategoria']) . "<br>";
        echo "Gabaryt Produktu: " . htmlspecialchars($row['gabaryt_produktu']) . "<br>";
        echo "Zdjęcie: " . htmlspecialchars($row['zdjecie']) . "<br>";
        echo "<hr>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $akcja = $_POST['akcja'] ?? '';

    switch ($akcja) {
        case 'dodaj':
            // Wywołaj funkcję DodajProdukt
            DodajProdukt(
                $_POST['tytul'],
                $_POST['opis'],
                $_POST['cena_netto'],    // Upewnij się, że te wartości są dostępne w formularzu
                $_POST['podatek_vat'],
                $_POST['ilosc_sztuk'],
                $_POST['status_dostepnosci'],
                $_POST['kategoria'],
                $_POST['gabaryt_produktu'],
                $_POST['zdjecie']
            );
            break;
        case 'usun':
            // Wywołaj funkcję UsunProdukt
            UsunProdukt($_POST['id']);
            break;
        case 'edytuj':
            // Wywołaj funkcję EdytujProdukt
            EdytujProdukt($_POST['id'], $_POST['tytul'], $_POST['opis'], /* inne parametry */);
            break;
        case 'pokaz':
			// Wywołaj funkcję PokazProdukty
            PokazProdukty();
            break;
    }
}
?>