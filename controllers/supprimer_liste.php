<?php
$id = $_POST["id_liste"];
supprimer_profil($id);
header('Location: ../index.php?page=admin');
?>
