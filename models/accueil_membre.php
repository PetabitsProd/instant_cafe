<?php
if($_SESSION['type'] == "client"){
  echo("Bonjour ".$_SESSION['prenom']);
  echo ("<br>Votre solde est de : ".$_SESSION['solde']."€");
} else {
  echo("<br> <h1>Panneau administrateur</h1>");
  echo("Bonjour ".$_SESSION['prenom']);
}
 ?>
