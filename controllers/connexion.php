<?php
session_start();
require('fonction.php');
$email = $_GET['email'];
$pass = $_GET['pass'];

if(connect_user($email,$pass) == true){
  header('Location: ../index.php?page=accueil_membre');
} else {
  header('Location: ../index.php?page=accueil');
  echo '<br><div class="alert alert-danger" role="alert">Mail ou Mot de passe incorrect</div>';
}
 ?>
