<?php
session_start();
include ("../cfg.php");
$link = mysqli_connect('localhost','root','', "moja_strona");

class Admin {
	private $conn;
	
	public function __construct($conn){
		$this->conn = $conn;
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

	
public function ListaPodstron() {
    $query = "SELECT * FROM page_list";
    $result = mysqli_query($this->conn, $query);

    echo '<h1>Lista Podstron</h1>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: {$row['id']}, Tytuł: {$row['page_title']}<br>";
        echo '<form method="post" action="' . $_SERVER['REQUEST_URI'] . '">';
        echo '<input type="hidden" name="page_id" value="' . $row['id'] . '">';
        echo '<input type="submit" name="usun_podstrone" value="Usuń">';
        echo '<input type="submit" name="edytuj_podstrone" value="Edytuj">';
        echo '</form>';
    }
}
}
$admin = new Admin($link);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login_email']) && isset($_POST['login_pass'])) {
        $login_email = $_POST['login_email'];
        $login_pass = $_POST['login_pass'];
        
        $admin->Logowanie($login_email, $login_pass);
    }
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo $admin->FormularzLogowania();
}
else{
    // Wyświetl listę podstron i formularz edycji, jeśli użytkownik jest zalogowany
    echo $admin->ListaPodstron();
}

?>
