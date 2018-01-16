<?php
$id = $_POST["id_produit"];
supprimer_produit($id);
header('Location: ../index.php?page=buvette');
?>
