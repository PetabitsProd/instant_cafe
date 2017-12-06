<?php
$email = $_GET['email'];
$pass = $_GET['pass'];

if(connect_user($email,$pass) == true){
  echo $_SESSION['nom'];
  include('views/accueil_membre.php');
} else if(connect_user($email,$pass) == false){
  echo '<br><div class="alert alert-danger" role="alert">Mail ou Mot de passe incorrect</div>';
  include('./views/accueil.php');
}
 ?>
