<?php
$nom = $_POST["nom"];
$desc = $_POST["desc"];
$iduser = $_POST["iduser"];
creer_groupe($nom, $desc, $iduser);
header('Location: ./index.php?page=admin');
?>
