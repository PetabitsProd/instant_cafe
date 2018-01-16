<?php
function getOS () {
// Retourne le mdp de la BDD qui diffère selon Windows ou autres.
	if( strtolower(substr(PHP_OS, 0, 3)) === "win") {
		$pass = "";
	} else {
		$pass = "root";
	}
	return $pass;
}

function connexion_bdd() {
	$pass = getOS();

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=instant_cafe', 'root', $pass);
	}catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	return $bdd;
}
?>
