<?php
session_start();
include ("../cfg.php");
$link = mysqli_connect('localhost','root','', "moja_strona");

class Admin {
	private $conn;
    private $pass = 'haslo';
	
	public function __construct($conn)
    {
		$this->conn = $conn;
	}

    public function Wyloguj()
    {
        session_destroy();
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    public function FormularzLogowania()
    {
        $wynik = '
        <div class="logowanie">
         <h1 class="heading">Zaloguj:</h1>
          <div class="logowanie">
           <form method="post" name="LoginForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
            <table class="logowanie">
              <tr><td class="log4_t">Email</td><td><input type="text" name="login_email" class="logowanie" /></td></tr>
              <tr><td class="log4_t">Hasło</td><td><input type="password" name="login_pass" class="logowanie" /></td></tr>
              <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="logowanie" value="zaloguj" /></td></tr>
            </table>
           </form>
          </div>
        </div>
        ';
        return $wynik;
    }

    public function logowanie($login, $pass)
    {
        if ($login === 'admin' && $pass === 'admin')
        {
            $_SESSION['logged_in'] = true;
        }
    }

    public function Kontakt($odbiorca)
    {
        if (empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email'])) {
            echo '[Nie wypełniłeś pola]';
            echo $this->FormularzKontaktowy();
        } else {
            $mail['subject'] = $_POST['temat'];
            $mail['body'] = $_POST['tresc'];
            $mail['sender'] = $_POST['email'];
            $mail['recipient'] = $odbiorca;

            $header = "From: Formularz kontaktowy <" . $mail['sender'] . ">\r\n";
            $header .= "MIME-Version: 1.0\r\nContent-Type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: 8bit\r\n";
            $header .= "X-Sender: <" . $mail['sender'] . ">\r\n";
            $header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
            $header .= "X-Priority: 3\r\n";
            $header .= "Return-Path: <" . $mail['sender'] . ">\r\n";

            mail($mail['recipient'], $mail['subject'], $mail['body'], $header);

            echo '[wiadomość wysłana]';
        }
    }

    public function FormularzKontaktowy()
    {
        $wynik = '
        <h1>Formularz Kontaktowy</h1>
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <label for="temat">Temat:</label>
            <input type="text" name="temat"><br>

            <label for="tresc">Treść:</label>
            <textarea name="tresc"></textarea><br>

            <label for="email">Email:</label>
            <input type="email" name="email"><br>

            <input type="submit" name="wyslij_mail_kontakt" value="Wyślij">
        </form>
        ';

        return $wynik;
    }

    public function PokazPrzypomnienieHasla()
    {
        $wynik = '
        <h1>Przypomnij Hasło</h1>
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <label for="email">Email:</label>
            <input type="email" name="email"><br>
            <input type="submit" name="przypomnij_haslo" value="Przypomnij hasło">
        </form>
        ';

        return $wynik;
    }

    public function PrzypomnijHaslo($email)
    {
        if (empty($email)) {
            echo '[Nie wypełniłeś pola]';
            echo $this->PokazPrzypomnienieHasla();
        } else {
            $mail['subject'] = 'Przypomnienie hasła';
            $mail['body'] = 'Twoje hasło: ' . $this->pass; // Tutaj używamy przykładowego hasła
            $mail['sender'] = '164459@student.uwm.edu.pl';
            $mail['recipient'] = $email;

            $header = "From: Przypomnienie hasła <" . $mail['sender'] . ">\r\n";
            $header .= "MIME-Version: 1.0\r\nContent-Type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: 8bit\r\n";
            $header .= "X-Sender: <" . $mail['sender'] . ">\r\n";
            $header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
            $header .= "X-Priority: 3\r\n";
            $header .= "Return-Path: <" . $mail['sender'] . ">\r\n";

            mail($mail['recipient'], $mail['subject'], $mail['body'], $header);

            echo '[przypomnienie_wysłane]';
        }
    }

    public function ListaPodstron()
    {
        $query = "SELECT * FROM page_list";
        $result = mysqli_query($this->conn, $query);

        echo '<h1>Lista Podstron</h1>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: {$row['id']}, Tytuł: {$row['page_title']}<br>";
            echo '<form method="post" action="' . $_SERVER['REQUEST_URI'] . '">';
            echo '<input type="hidden" name="page_id" value="' . $row['id'] . '">';
            echo '<input type="submit" name="edytuj_podstrone" value="Edytuj">';
            echo '</form>';
        }
        if (isset($_POST['edytuj_podstrone']))
        {
            echo $this->FormularzEdytujPodstrone($_POST['page_id']);
        }
    }

    public function FormularzEdytujPodstrone($id)
    {
        $query = "SELECT * FROM page_list WHERE id = '$id'";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $wynik = '
            <h2>Edytuj Podstronę</h2>
            <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
                <input type="hidden" name="id" value="' . $row['id'] . '">
                <label for="page_title">Tytuł:</label>
                <input type="text" name="page_title" value="' . $row['page_title'] . '"><br>

                <label for="page_content">Treść:</label>
                <textarea name="page_content">' . $row['page_content'] . '</textarea><br>

                <label for="status">Status:</label>
                <input type="text" name="status" value="' . $row['status'] . '"><br>

                <input type="submit" name="zapisz_edytuj_podstrone" value="Zapisz">
            </form>
            ';
            return $wynik;
        } else {
            return 'Podstrona nie istnieje.';
        }
    }
    public function EdytujPodstrone($id, $title, $content, $status)
    {
        $query = "UPDATE page_list SET page_title = '$title', page_content = '$content', status = '$status' WHERE id = '$id'";
        mysqli_query($this->conn, $query);

        if(mysqli_affected_rows($this->conn) > 0) {
            echo 'Podstrona została zaktualizowana.';
        } else {
            echo 'Wystąpił błąd podczas aktualizacji podstrony.';
        }
    }

    public function FormularzDodajPodstrone()
    {
        $wynik = '
        <h1>DodajPodstronę</h1>
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <label for="page_title">Tytuł:</label>
            <input type="text" name="page_title" required><br>

            <label for="page_content">Treść:</label>
            <textarea name="page_content" required></textarea><br>

            <label for="status">Status:</label>
            <input type="text" name="status" required><br>

            <input type="submit" name="dodaj_nową_podstronę" value="Dodaj">
        </form>
        ';
        return $wynik;
    }
    public function DodajNowaPodstrone($title, $content, $status)
    {
        $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('$title', '$content', '$status')";
        mysqli_query($this->conn, $query);
    }

    public function FormularzUsunPodstrone()
    {
        $wynik = '
        <h1>Usuń Podstronę</h1>
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <label for="id">ID Podstrony:</label>
            <input type="number" name="id" required><br>

            <input type="submit" name="usun_podstrone" value="Usuń">
        </form>
        ';
        return $wynik;
    }
    public function UsunPodstrone($id)
    {
        $query = "DELETE FROM page_list WHERE id = $id";
        mysqli_query($this->conn, $query);
    }

    public function DodajKategorie($matka, $nazwa)
    {
        if($matka == null) {
            $matka=0;
        }
        $query = "INSERT INTO kategoria (matka, nazwa) VALUES ($matka, '$nazwa')";
        mysqli_query($this->conn, $query);
    }
    public function FormularzDodajKategorie()
    {
        $wynik = '
        <h1>Dodaj Kategorię</h1>
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <label for="matka">Kategoria nadrzędna:</label>
            <input type="text" name="matka"><br>

            <label for="nazwa">Nazwa:</label>
            <input type="text" name="nazwa"><br>

            <input type="submit" name="dodaj_kategorie" value="Dodaj kategorię">
        </form>
    ';
        return $wynik;
    }

    public function UsunKategorie($id)
    {
        $query = "DELETE FROM kategoria WHERE id = $id";
        mysqli_query($this->conn, $query);

        if(mysqli_affected_rows($this->conn) > 0) {
            echo 'Kategoria została usunięta.';
        } else {
            echo 'Wystąpił błąd podczas usuwania kategorii.';
        }
    }
    public function FormularzUsunKategorie()
    {
        $wynik = '
        <h1>Usuń Kategorię</h1>
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <label for="id">ID Kategorii:</label>
            <input type="number" name="id_kategorii" required><br>
            <input type="submit" name="usun_kategorie" value="Usuń kategorię">
        </form>
        ';
        return $wynik;
    }

    public function EdytujKategorie($id, $nazwa)
    {
        $query = "UPDATE kategoria SET nazwa = '$nazwa' WHERE id = $id";
        mysqli_query($this->conn, $query);
    }
    public function FormularzEdytujKategorie()
    {
        $wynik = '
        <h1>Edytuj Kategorię</h1>
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <label for="id_kategorii">ID Kategorii:</label>
            <input type="number" name="id_kategorii" required><br>
    
            <label for="nazwa_kategori">Nowa Nazwa Kategorii:</label>
            <input type="text" name="nazwa_kategori" required><br>
    
            <input type="submit" name="edytuj_kategorie" value="Edytuj kategorię">
        </form>
        ';
        return $wynik;
    }

    public function PokazKategorie()
    {
        $query = "SELECT * FROM kategoria";
        $result = mysqli_query($this->conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<h2>Lista Kategorii</h2>';
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Nazwa</th><th>Matka</th></tr>'; // Headers

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . htmlspecialchars($row['nazwa']) . '</td>';
                echo '<td>' . $row['matka'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'Brak kategorii.';
        }
    }
    public function FormularzPokazKategorie()
    {
        $wynik = '
        <h1>Pokaz Kategorie</h1>
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <input type="submit" name="pokaz_kategorie" value="Pokaż Kategorie">
        </form>
    ';
        return $wynik;
    }
    public function GenerujDrzewoKategorii($matka = 0, $indent = 0)
    {
        $query = "SELECT * FROM kategoria WHERE matka = $matka";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo str_repeat("&nbsp;&nbsp;", $indent);
            echo "   id:{$row['id']}: {$row['nazwa']}<br>";

            $this->GenerujDrzewoKategorii($row['id'], $indent + 1);
        }
    }
    public function FormularzGenerujDrzewoKategorii()
    {
        $wynik = '
            <h1>Generuj Drzewo Kategorii</h1>
            <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
                <input type="submit" name="generuj_drzewo_kategorii" value="Generuj Drzewo Kategorii">
            </form>
            ';
        return $wynik;
    }

    public function DodajProdukt($tytul, $opis, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie)
    {
        $query = "INSERT INTO produkt (tytul, opis, data_wygasniecia, cena_netto, podatek_vat, ilosc_dostepnych_sztuk, status_dostepnosci, kategoria, gabaryt_produktu, zdjecie) 
                  VALUES ('$tytul', '$opis', '$data_wygasniecia', $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, '$status_dostepnosci', '$kategoria', '$gabaryt_produktu', '$zdjecie')";
        mysqli_query($this->conn, $query);
    }
    public function FormularzDodajProdukt()
    {
        $wynik = '
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <h1>Dodaj Produkt</h1>
        
            <label for="tytul">Tytuł:</label>
            <input type="text" name="tytul" required><br>
        
            <label for="opis">Opis:</label>
            <textarea name="opis" required></textarea><br>
        
            <label for="data_wygasniecia">Data Wygaśnięcia:</label>
            <input type="date" name="data_wygasniecia"><br>
        
            <label for="cena_netto">Cena Netto:</label>
            <input type="number" step="0.01" name="cena_netto" required><br>
        
            <label for="podatek_vat">Podatek VAT:</label>
            <input type="number" step="0.01" name="podatek_vat" required><br>
        
            <label for="ilosc_dostepnych_sztuk">Ilość Dostępnych Sztuk:</label>
            <input type="number" name="ilosc_dostepnych_sztuk" required><br>
        
            <label for="status_dostepnosci">Status Dostępności:</label>
            <input type="text" name="status_dostepnosci"><br>
        
            <label for="kategoria">Kategoria:</label>
            <input type="text" name="kategoria"><br>
        
            <label for="gabaryt_produktu">Gabaryt Produktu:</label>
            <input type="text" name="gabaryt_produktu"><br>
        
            <label for="zdjecie">Zdjęcie:</label>
            <input type="text" name="zdjecie"><br>
        
            <input type="submit" name="dodaj_produkt" value="Dodaj Produkt">
        </form>
        ';
        return $wynik;
    }

    public function UsunProdukt($id)
    {
        $query = "DELETE FROM produkt WHERE id = $id";
        mysqli_query($this->conn, $query);
    }
    public function FormularzUsunProdukt()
    {
        $wynik = '
        <h1>Usuń Produkt</h1>
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <label for="id_produktu">ID Produktu:</label>
            <input type="number" name="id_produktu" required><br>
            
            <input type="submit" name="usun_produkt" value="Usuń Produkt">
        </form>
        ';
        return $wynik;
    }

    public function EdytujProdukt($id, $tytul, $opis, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie)
    {
        $query = "UPDATE produkt SET tytul = '$tytul', opis = '$opis', data_wygasniecia = '$data_wygasniecia', 
                   cena_netto = $cena_netto, podatek_vat = $podatek_vat, 
                   ilosc_dostepnych_sztuk = '$ilosc_dostepnych_sztuk', status_dostepnosci = '$status_dostepnosci', 
                   kategoria = '$kategoria', gabaryt_produktu = '$gabaryt_produktu', zdjecie = '$zdjecie' 
                   WHERE id = $id";
        mysqli_query($this->conn, $query);
    }
    public function FormularzEdytujProdukt()
    {
        $wynik = '
        <h1>Edytuj Produkt</h1>
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <label for="produkt_id">ID Produktu:</label>
            <input type="text" name="id" required><br>
            
            <label for="tytul">Tytuł:</label>
            <input type="text" name="tytul"><br>
        
            <label for="opis">Opis:</label>
            <textarea name="opis" required></textarea><br>
        
            <label for="data_wygasniecia">Data Wygaśnięcia:</label>
            <input type="date" name="data_wygasniecia"><br>
        
            <label for="cena_netto">Cena Netto:</label>
            <input type="number" step="0.01" name="cena_netto"><br>
        
            <label for="podatek_vat">Podatek VAT:</label>
            <input type="number" step="0.01" name="podatek_vat"><br>
        
            <label for="ilosc_dostepnych_sztuk">Ilość Dostępnych Sztuk:</label>
            <input type="number" name="ilosc_dostepnych_sztuk"><br>
        
            <label for="status_dostepnosci">Status Dostępności:</label>
            <input type="text" name="status_dostepnosci"><br>
        
            <label for="kategoria">Kategoria:</label>
            <input type="text" name="kategoria"><br>
        
            <label for="gabaryt_produktu">Gabaryt Produktu:</label>
            <input type="text" name="gabaryt_produktu"><br>
        
            <label for="zdjecie">Zdjęcie:</label>
            <input type="text" name="zdjecie"><br>
            
            <input type="submit" name="edytuj_produkt" value="Zapisz zmiany">
        </form>
        ';
        return $wynik;
    }
    public function PokazProdukty()
    {
        $query = "SELECT * FROM produkt";
        $result = mysqli_query($this->conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<h2>Lista Produktów</h2>';
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Tytuł</th><th>Opis</th><th>Data Wygaśnięcia</th><th>Cena Netto</th><th>Podatek VAT</th><th>Ilość Dostępnych Sztuk</th><th>Status Dostępności</th><th>Kategoria</th><th>Gabaryt Produktu</th><th>Zdjęcie</th></tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . htmlspecialchars($row['tytul']) . '</td>';
                echo '<td>' . htmlspecialchars($row['opis']) . '</td>';
                echo '<td>' . $row['data_wygasniecia'] . '</td>';
                echo '<td>' . $row['cena_netto'] . '</td>';
                echo '<td>' . $row['podatek_vat'] . '</td>';
                echo '<td>' . $row['ilosc_dostepnych_sztuk'] . '</td>';
                echo '<td>' . $row['status_dostepnosci'] . '</td>';
                echo '<td>' . $row['kategoria'] . '</td>';
                echo '<td>' . $row['gabaryt_produktu'] . '</td>';
                echo '<td>' . $row['zdjecie'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'Brak produktów.';
        }
    }
    public function FormularzPokazProdukty()
    {
        $wynik = '
    <h1>Pokaz Produkty</h1>
    <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
        <input type="submit" name="pokaz_produkty" value="Pokaż Produkty">
    </form>
    ';
        return $wynik;
    }
}
$admin = new Admin($link);

if (isset($_GET['wyloguj'])) {
    $admin->Wyloguj();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login_email']) && isset($_POST['login_pass'])) {
        $login_email = $_POST['login_email'];
        $login_pass = $_POST['login_pass'];

        $admin->Logowanie($login_email, $login_pass);
    }
    if (isset($_POST['wyslij_mail'])) {
        $admin->Kontakt('admin@gmail.com');
    }
    if (isset($_POST['przypomnij_haslo']) && !empty($_POST['email'])) {
        $admin->PrzypomnijHaslo($_POST['email']);
    }
    if (isset($_POST['zapisz_edytuj_podstrone'])) {
        $id = $_POST['id'];
        $title = $_POST['page_title'];
        $content = $_POST['page_content'];
        $status = $_POST['status'];

        $admin->EdytujPodstrone($id, $title, $content, $status);
    }
    if (isset($_POST['dodaj_nową_podstronę'])) {
        $title = $_POST['page_title'];
        $content = $_POST['page_content'];
        $status = $_POST['status'];

        $admin->DodajNowaPodstrone($title, $content, $status);
    }
    if (isset($_POST['usun_podstrone']) && isset($_POST['id'])) {
        $id = $_POST['id'];

        $admin->UsunPodstrone($id);
    }
    if (isset($_POST['dodaj_kategorie'])) {
        $nazwa = $_POST['nazwa'];
        $matka = $_POST['matka'];

        $admin->DodajKategorie($matka, $nazwa);
    }
    if (isset($_POST['usun_kategorie']) && !empty($_POST['id_kategorii'])) {
        $id = $_POST['id_kategorii'];
        $admin->UsunKategorie($id);
    }
    if (isset($_POST['edytuj_kategorie']) && !empty($_POST['id_kategorii'])) {
        $id = $_POST['id_kategorii'];
        $nazwa = $_POST['nazwa_kategori'];
        $admin->EdytujKategorie($id, $nazwa);
    }
    if (isset($_POST['pokaz_kategorie'])) {
        $admin->PokazKategorie();
    }
    if (isset($_POST['generuj_drzewo_kategorii'])) {
        $admin->GenerujDrzewoKategorii();
    }
    if (isset($_POST['dodaj_produkt'])) {
        $tytul = $_POST['tytul'];
        $opis = $_POST['opis'];
        $data_wygasniecia = $_POST['data_wygasniecia'];
        $cena_netto = $_POST['cena_netto'];
        $podatek_vat = $_POST['podatek_vat'];
        $ilosc_dostepnych_sztuk = $_POST['ilosc_dostepnych_sztuk'];
        $status_dostepnosci = $_POST['status_dostepnosci'];
        $kategoria = $_POST['kategoria'];
        $gabaryt_produktu = $_POST['gabaryt_produktu'];
        $zdjecie = $_POST['zdjecie'];
        $admin->DodajProdukt($tytul, $opis, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie);
    }
    if (isset($_POST['usun_produkt']) && !empty($_POST['id_produktu'])) {
        $id_produktu = $_POST['id_produktu'];
        $admin->UsunProdukt($id_produktu);
    }
    if (isset($_POST['edytuj_produkt'])) {
        $id = $_POST['id'];
        $tytul = $_POST['tytul'];
        $opis = $_POST['opis'];
        $data_wygasniecia = $_POST['data_wygasniecia'];
        $cena_netto = $_POST['cena_netto'];
        $podatek_vat = $_POST['podatek_vat'];
        $ilosc_dostepnych_sztuk = $_POST['ilosc_dostepnych_sztuk'];
        $status_dostepnosci = $_POST['status_dostepnosci'];
        $kategoria = $_POST['kategoria'];
        $gabaryt_produktu = $_POST['gabaryt_produktu'];
        $zdjecie = $_POST['zdjecie'];

        $admin->EdytujProdukt($id, $tytul, $opis, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['pokaz_produkty'])) {
            $admin->PokazProdukty();
        }
    }
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Wyświetlenie wszystkich formularzy przed zalogowaniem
    echo $admin->FormularzLogowania();
    echo $admin->FormularzKontaktowy();
    echo $admin->PokazPrzypomnienieHasla();
}
else {
    // Wyświetlenie wszystkich formularzy po zalogowaniu
    echo '<a href="?wyloguj=1">Wyloguj</a>';
    echo $admin->ListaPodstron();
    echo $admin->FormularzDodajPodstrone();
    echo $admin->FormularzUsunPodstrone();
    echo $admin->FormularzDodajKategorie();
    echo $admin->FormularzUsunKategorie();
    echo $admin->FormularzEdytujKategorie();
    echo $admin->FormularzPokazKategorie();
    echo $admin->FormularzGenerujDrzewoKategorii();
    echo $admin->FormularzDodajProdukt();
    echo $admin->FormularzUsunProdukt();
    echo $admin->FormularzEdytujProdukt();
    echo $admin->FormularzPokazProdukty();
}

