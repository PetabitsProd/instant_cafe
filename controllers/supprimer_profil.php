<?php
$nom = $_POST["profil"];
require('fonction.php');
supprimer_profil($nom);
echo "PFH supprimé";
//header('Location: ../index.php?page=admin');
?>
