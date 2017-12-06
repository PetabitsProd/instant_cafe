<?php
function send_mail(){
  $bdd = connexion_bdd();

  //Encodage du mail
  $header="MIME-Version: 1.0\r\n";
  $header.='From: "Instant Cafe"<buvette.intechinfo@gmail.com>'."\n";
  $header.='Content-Type:text/html; charset="UTF-8"'."\n";
  $header.='Content-Transfer-Encoding: 8bit';

  //Envoi du mail
  $req = $bdd->query("SELECT prenom, email, password FROM user");

  while($result = $req->fetch())
  {
  		$cle = $result['password'];
  		$prenom = $result['prenom'];
  		$message='
  		<!DOCTYPE html>
  		<html>
  			<body>
  				<CENTER>
  					<h1>Créez votre compte Instant Café !</h1>
  					<br>
  					<img src="http://imageshack.com/a/img923/6434/BGtfRL.png" width="150px" height="150px"/>
  					<br>
  					<br>

  					<h3>Bonjour '.$prenom.' !!</h3>
  					<em>Pour bien commencer la journée, pensez Instant Café !</em>
  					<br>
  					<br>
  					<a href="http://instantcafe:8888/index.php?page=inscription&key='.$cle.'">Créer un compte</a>
  				</CENTER>
  			</body>
  		</html>
  		';
  	mail($result['email'], "Testitude", $message, $header);
  }
}
?>
