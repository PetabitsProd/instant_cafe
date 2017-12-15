<?php
$nom = $_GET["profil"];
echo $nom;
require('fonction.php');
supprimer_profil($nom);
//header('Location: ../index.php?page=admin');
?>
