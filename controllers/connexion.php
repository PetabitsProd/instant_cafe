<?php
session_start();
require('fonction.php');
$email = $_GET['email'];
$pass = $_GET['pass'];

if(connect_user($email,$pass) == true){
  header('Location: http://instantcafe:8888/index.php?page=accueil_membre');
  //include('../views/accueil_membre.php');
} else if(connect_user($email,$pass) == false){
  echo '<br><div class="alert alert-danger" role="alert">Mail ou Mot de passe incorrect</div>';
  include('../views/accueil.php');
}
 ?>
