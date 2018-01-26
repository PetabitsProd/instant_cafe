<?php
$allName = explode(';', $_POST["nomComplet"]);
for ($i=0; $i < 5; $i++) { 
	$complet = $allName[$i];
	$nomComplet = explode(' ', $complet);
	$nom = $nomComplet[0];
	$prenom = $nomComplet[1];
	echo($nom);
	echo($prenom);
	echo'<br>';

}

/*creer_groupe($nomComplet, $desc, $iduser);
header('Location: ./index.php?page=admin');
$desc = $_POST["desc"];
$iduser = $_POST["iduser"];*/
?>
