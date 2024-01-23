<?php

	function PokazKontakt() {
		echo '<form method="post" action="contact.php">
				<label for="temat">Temat:</label>
				<input type="text" id="temat" name="temat"><br>
				<label for="email">Twój email:</label>
				<input type="email" id="email" name="email"><br>
				<label for="tresc">Treść wiadomości:</label>
				<textarea id="tresc" name="tresc"></textarea><br>
				<input type="submit" value="Wyślij">
			  </form>';
	}
	
	function WyslijMailKontakt($odb)
	{
		if(empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
		{
			echo '</br>[Nie wszystkie pola zostaly wypelnione]';
			echo PokazKontakt();
		}
		else
		{
			$mail['subject'] = $_POST['temat'];
			$mail['body'] = $_POST['tresc'];
			$mail['sender'] = $_POST['email'];
			$mail['reciptient'] = $odb;

			$header = "From: Formularz kontaktowy <".$mail['sender']."\n";
			$header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: \n";
			$header .= "X-Sender: <".$mail['sender'].">\n";
			$header .= "X-Mailer: PRapWWW mail 1.2\n";
			$header .= "X-Priority: 3\n";
			$header .= "Return-Path: <".$mail['sender'].">\n";

			mail($mail['reciptient'],$mail['subject'], $mail['body'], $header);

			echo 'wiadomosc zostala wyslana';
		}
	}
	function PrzypomnijHaslo() {
    global $login, $pass;
	}
	
	$email = 'admin@gmail.com';
	$password = 'admin';
	
	WyslijMailKontakt($email)
?>