<?php

function verif_inscription ($email, $pass, $repass ,$key) {

	if (empty($email) || empty($pass) || empty($repass)) {
		echo '<br><div class="alert alert-danger" role="alert">Veuillez remplir tout les champs</div>';
		include('./views/inscription.php');
	} else {
		$bdd = connexion_bdd();
		$req1 = $bdd->query('SELECT email, password FROM user');
		while ($result = $req1->fetch())
		{
			if ($result["email"] == $email && $result["password"] == $key && $pass == $repass) {
				$req = $bdd->prepare('UPDATE user SET password = :password WHERE email = :mail ');
				$req->execute(array(
					'password' => $pass,
					'mail' => $email
			));
				$req->closeCursor();
				 echo "<h3>Votre mot de passe a été modifier avec succès</h3>";
			} else {
				echo '<br><div class="alert alert-danger" role="alert">Mail ou Mot de passe incorrect</div>';
				include('./views/inscription.php');
			}
		}
		$req1->closeCursor();
	}
}

function connect_user($email,$pass){
	require('config.php');
	$bdd = connexion_bdd();
	$reponse = $bdd->query('SELECT * FROM user');

  while ($donnees = $reponse->fetch())
  {
    if($donnees['email'] == $email && $pass == $donnees['password']){
	    $_SESSION['nom'] = $donnees['nom'];
	    $_SESSION['prenom'] = $donnees['prenom'];
	    $_SESSION['solde'] = $donnees['solde'];
			$_SESSION['type'] = $donnees['type'];
			$result = true;
		break;
    } else {
			$result = false;
		}

  }
  $reponse->closeCursor(); // Termine le traitement de la requête
	return($result);
}
?>
