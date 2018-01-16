<?php

// FONCTION POUR VÉRIFIER UNE INSCRIPTION
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

function changer_mdp ($old_password, $password, $new_password) {

	if (empty($old_password) || empty($password) || empty($new_password)) {
		echo '<br><div class="alert alert-danger" role="alert">Veuillez remplir tout les champs</div>';
		include('./views/changer_mdp.php');
	} else {
		$bdd = connexion_bdd();
		$req1 = $bdd->query('SELECT password, ID_user FROM user');
		while ($result = $req1->fetch())
		{
			if ($result["password"] == $old_password && $password == $new_password && $result["ID_user"] == $_SESSION['ID_user']) {
				$req = $bdd->prepare('UPDATE user SET password = :password WHERE ID_user = :ID_user ');
				$req->execute(array(
					'password' => $password,
					'ID_user' => $_SESSION['ID_user']
			));
				$req->closeCursor();
				 echo "<h3>Votre mot de passe a été modifié avec succès</h3>";
				 $req1->closeCursor();
			} else {
				echo '<br><div class="alert alert-danger" role="alert">Mot de passe incorrect</div>';
				include('./views/changer_mdp.php');
				$req1->closeCursor();

			}
		}

	}
}

// FONCTION POUR CONNECTER UN UTLISISATEUR
function connect_user($email,$pass){
	$bdd = connexion_bdd();
	$reponse = $bdd->query('SELECT * FROM user');

  while ($donnees = $reponse->fetch())
  {
    if($donnees['email'] == $email && $pass == $donnees['password']){
	    $_SESSION['nom'] = $donnees['nom'];
	    $_SESSION['prenom'] = $donnees['prenom'];
	    $_SESSION['solde'] = $donnees['solde'];
	    $_SESSION['ID_pfh'] = $donnees['ID_pfh'];
	    $_SESSION['ID_user'] = $donnees['ID_user'];
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

function creer_groupe($nom, $desc, $iduser) {
	$bdd = connexion_bdd();
	$req = $bdd->prepare('INSERT INTO pfh (nom,solde,description) VALUES(:nom, :solde, :description)');
	$req->execute(array(
		'nom' => $nom,
		'solde' => 0,
		'description' => $desc,
		));
	$req->closeCursor();

	$id_pfh = $bdd->lastInsertId();
	$req1 = $bdd->prepare('UPDATE user SET ID_pfh = :id WHERE ID_user = :id1');
	$req1->execute(array(
		'id' => $id_pfh,
		'id1' => $iduser
	));
}

function supprimer_profil($id) {
	$bdd = connexion_bdd();
	$req_recup = $bdd->query('SELECT id FROM pfh WHERE ID_pfh = '.$id);
	$req_sup = $bdd->exec('DELETE FROM pfh WHERE ID_pfh = '.$id) or die(print_r($bdd->errorInfo(), true));
	// $req = $bdd->query('SELECT nom FROM pfh WHERE ');
	// while ($result = $req->fetch()) {
	// 	if($nom == $result["nom"]) {
	// 		$req1 = $bdd->prepare('DELETE FROM pfh WHERE nom = :nom');
	// 		$req1->execute(array(
	// 			'nom' => $nom
	// 		));
	// 	}
	// }
	// $req->closeCursor();
	// $req1->closeCursor();
}

function save_produit($nom,$prix,$quantite,$image){
	include('saveImage.php');
  $bdd = connexion_bdd();


  if(!empty($nom) && !empty($prix) && !empty($quantite) && !empty($image)){

    $req = $bdd->prepare('INSERT INTO produit (nom , img) VALUES (:nom , :nom)');
    $req->execute(array(
      'nom' => $nom,
    ));

    $ID_produit = $bdd->lastInsertId();

    $req = $bdd->prepare('INSERT INTO ligne_produit (ID_pfh, ID_produit, quantite ,prix) VALUES (:id , :IDproduit , :qte , :prix  )');
    $req->execute(array(
      'id' => $_SESSION['ID_pfh'],
      'prix' => $prix,
      'qte' => $quantite,
      'IDproduit' => $ID_produit
    ));
		modif_img($nom);

  }else {
    echo('il faut remplire tout les champs du formulaire');
  }

echo('produit mise a jour');
}

function supprimer_produit($id) {
	$bdd = connexion_bdd();
	$req_recup = $bdd->query('SELECT id FROM produit WHERE id_produit = '.$id);
	$req_sup = $bdd->exec('DELETE FROM produit WHERE ID_produit = '.$id) or die(print_r($bdd->errorInfo(), true));
	// $req = $bdd->query('SELECT nom FROM pfh WHERE ');
	// while ($result = $req->fetch()) {
	// 	if($nom == $result["nom"]) {
	// 		$req1 = $bdd->prepare('DELETE FROM pfh WHERE nom = :nom');
	// 		$req1->execute(array(
	// 			'nom' => $nom
	// 		));
	// 	}
	// }
	// $req->closeCursor();
	// $req1->closeCursor();
}

function change_status(){
	$bdd = connexion_bdd();
	$req = $bdd->prepare('UPDATE pfh SET actif = "oui" WHERE ID_pfh = :id');
	$req->execute(array(
		'id' => $_SESSION["ID_pfh"],
	));
}

function change_status1(){
	$bdd = connexion_bdd();
	$req = $bdd->prepare('UPDATE pfh SET actif = "non" WHERE ID_pfh = :id');
	$req->execute(array(
		'id' => $_SESSION["ID_pfh"],
	));
}

?>
