 <?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

	if($_GET['idp'] == '')$strona = 'html/glowna.html';
	if($_GET['idp'] == 'azja')$strona = 'html/azja.html';
	if($_GET['idp'] == 'amerykapolnocna')$strona = 'html/amerykapolnocna.html';
	if($_GET['idp'] == 'europa')$strona = 'html/europa.html';
	if($_GET['idp'] == 'galeria')$strona = 'html/galeria.html';
	if($_GET['idp'] == 'kontakt')$strona = 'html/kontakt.html';
	
	include($strona);
	
	if (file_exists($strona)) {
    echo "The file $strona exists";
	} else {
		echo "The file $strona does not exist";
	}
		
	$nr_indeksu = '164459';
	$nrGrupy = '1';
	
	echo 'Autor: Miłosz Budzichowski '.$nr_indeksu.' grupa '.$nrGrupy.'<br/><br/>';
?>