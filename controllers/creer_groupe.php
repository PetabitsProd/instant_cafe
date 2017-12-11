<?php
$nom = $_POST["nom"];
$iduser = $_POST["iduser"];
echo $nom;
echo $iduser;
require('fonction.php');	
creer_groupe($nom, $iduser);
header('Location: ../index.php?page=admin');
?>
