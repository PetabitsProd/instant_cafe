<?php
$image = $_FILES['img'];
$nom = $_POST['nom'];
$ID_pfh = $_SESSION["ID_pfh"];
$prix = $_POST['prix'];
$quantite = $_POST['quantite'];
save_produit($nom,$prix,$quantite,$image);
 ?>
