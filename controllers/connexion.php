<?php
$email = $_POST['email'];
$pass = $_POST['pass'];

if(connect_user($email,$pass) == true){
  if ($_SESSION['type'] == 'admin') {
    header('Location:./index.php?page=admin');
  } else {
    header('Location:./index.php?page=accueil_membre');
  }
} else {
  header('Location:./index.php?page=accueil');
  echo '<br><div class="alert alert-danger" role="alert">Mail ou Mot de passe incorrect</div>';
}
 ?>
