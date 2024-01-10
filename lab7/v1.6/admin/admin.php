<?php
	session_start();
	include ("../cfg.php");
	include("../showpage.php");
	$link = mysqli_connect('localhost','root','', "moja_strona");
	
	function FormularzLogowania()
	{
	$wynik = '
    <div class="logowanie">
        <h1 class="heading">Panel CMS:</h1>
        <div class="logowanie">
            <form method="post" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'"> 
                <table class="logowanie">
                    <tr><td class="log4_t">[email]</td><td><input type="text" name="login_email" class="logowanie" /></td></tr>
                    <tr><td class="log4_t">[haslo]</td><td><input type="password" name="login_pass" class="logowanie" /></td></tr>
                    <tr><td>&nbsp</td><td><input type="submit" name="x1_submit" class="logowanie" value="Zaloguj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';
	return $wynik;
	}

    function ListaPodstron() 
	{
        global $link;

        $query = "SELECT id, page_title FROM page_list";
        $result = mysqli_query($link, $query);

        if ($result) {
            echo '<table>';
            echo '<tr><th>ID</th><th>Tytuł Podstrony</th><th>Akcje</th></tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['page_title']) . '</td>';
                echo '<td>
                        <a href="edytuj.php?id=' . $row['id'] . '">Edytuj</a> | 
                        <a href="usun.php?id=' . $row['id'] . '">Usuń</a>
                      </td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'Błąd podczas pobierania listy podstron: ' . mysqli_error($db);
        }
    }

	
	function EdytujPodstrone($id) 
	{
    global $link;

    $query = "SELECT * FROM page_list WHERE id = $id";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Podstrona o ID $id nie została znaleziona.";
        return;
    }

    echo '<form method="post" action="sciezka_do_skryptu_przetwarzajacego.php">';
    echo '<input type="hidden" name="id" value="' . $id . '">';
    echo '<label for="title">Tytuł:</label>';
    echo '<input type="text" id="title" name="title" value="' . htmlspecialchars($row['page_title']) . '"><br>';
    echo '<label for="content">Treść:</label>';
    echo '<textarea id="content" name="content">' . htmlspecialchars($row['page_content']) . '</textarea><br>';
    echo '<label for="status">Aktywna:</label>';
    echo '<input type="checkbox" id="status" name="status"' . ($row['status'] ? ' checked' : '') . '><br>';
    echo '<input type="submit" value="Zapisz">';
    echo '</form>';	
	}
	
	
	function DodajNowaPodstrone() 
	{
    echo '<form method="post" action="sciezka_do_skryptu_przetwarzajacego_dodawanie.php">';
    echo '<label for="title">Tytuł:</label>';
    echo '<input type="text" id="title" name="title"><br>';
    echo '<label for="content">Treść:</label>';
    echo '<textarea id="content" name="content"></textarea><br>';
    echo '<label for="status">Aktywna:</label>';
    echo '<input type="checkbox" id="status" name="status"><br>';
    echo '<input type="submit" value="Dodaj">';
    echo '</form>';
	
	}
	
	function UsunPodstrone($id) 
	{
    global $link;
    $query = "DELETE FROM page_list WHERE id=$id LIMIT 1";
    mysqli_query($link, $query);

    echo 'Podstrona została usunięta!';
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        DodajNowaPodstrone();
    }
    if (isset($_POST["edit"])) {
        $id = $_POST["edit"];
        EdytujPodstrone($id);
    }
    if (isset($_POST["delete"])) {
        $id = $_POST["delete"];
        UsunPodstrone($id);
    }
}
?>