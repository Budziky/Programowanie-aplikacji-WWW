<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$baza = "moja_strona";

	$link = mysqli_connect($dbhost,$dbuser,$dbpass, $baza);
	if(mysqli_connect_errno())
	{
		exit("przerwane połączenie: </b>".mysqli_connect_error());
	}
	if(!mysqli_select_db($link, $baza))
	{
		echo "nie wybrano bazy";
	}

	$login = "admin";
	$pass = "admin";
?>