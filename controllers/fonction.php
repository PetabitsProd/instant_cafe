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
	require('config.php');
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
function mdp_oublie($email) {
	require('config.php');
	$header="MIME-Version: 1.0\r\n";
	$header.='From: "Instant Cafe"<buvette.intechinfo@gmail.com>'."\n";
	$header.='Content-Type:text/html; charset="UTF-8"'."\n";
	$header.='Content-Transfer-Encoding: 8bit';

	if (empty($email)) {
		echo '<br><div class="alert alert-danger" role="alert">Veuillez remplir le champs mail</div>';
		include('./views/mdp_oublie.php');
	} else {
		$bdd = connexion_bdd();
		$req1 = $bdd->query('SELECT email, prenom, password  FROM user');
		while ($result = $req1->fetch())
		{
			if ($result["email"] == $email) {
				$mdp = $result['password'];
				$prenom = $result['prenom'];
		  		$message='
		  		<!DOCTYPE html>
		  		<html>
		  			<body>
		  				<CENTER>
		  					<h1>Vous avez oublié votre mot de passe ? !</h1>
		  					<br>
		  					<img src="http://imageshack.com/a/img923/6434/BGtfRL.png" width="150px" height="150px"/>
		  					<br>
		  					<br>

		  					<h3>Bonjour '.$prenom.' !!</h3>
		  					<em>Pour bien commencer la journée, pensez Instant Café !</em>
		  					<br>
		  					<h4>Ci-dessous, votre mot de passe lié à votre éspace Instant Café :</h4>
		  					<br>
		  					<h2 style="color: red;">'.$mdp.'</h2>
		  				</CENTER>
		  			</body>
		  		</html>
		  		';
		  		mail($result['email'], "Votre mot de passe Instant Café", $message, $header);
		  		header('Location: ../index.php');
			}

		}
	}
}

function creer_groupe($nom, $iduser) {
	require('config.php');
	$bdd = connexion_bdd();
	$req = $bdd->prepare('INSERT INTO pfh (nom,solde) VALUES(:nom, :solde)');
	$req->execute(array(
		'nom' => $nom,
		'solde' => 0,
		));
	$req->closeCursor();

	$req = $bdd->query('SELECT ID_pfh, nom FROM pfh');
	while ($result = $req->fetch()) {
		if ($nom == $result['nom']) {
			$idpfh = $result['ID_pfh'];
			$req1 = $bdd->query('SELECT ID_user FROM user');
			while ($result2 = $req1->fetch()) {
				if ($iduser == $result2['ID_user']) {
					$req2 = $bdd->prepare('UPDATE user SET ID_pfh = :idpfh WHERE ID_user = :iduser');
					$req2->execute(array(
						'iduser' => $iduser,
						'idpfh' => $idpfh,
					));
				}
			}
			$req2->closeCursor();
		}
	}
	$req1->closeCursor();
	$req->closeCursor();
}

function supprimer_profil($nom) {
	require('config.php');
	$bdd = connexion_bdd();
	$req_recup = $bdd->query('SELECT nom FROM pfh WHERE nom = '.$nom);
	$req_sup = $bdd->exec('DELETE FROM pfh WHERE nom = '.$nom) or die(print_r($bdd->errorInfo(), true));
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

//verifie et traite les envoi d'image

function modif_img($type,$nom_produit){

$erreur ="";
$maxsize = "1048576";
if($type == "logo")$nom = "../ressources/logo/".$_SESSION["ID_pfh"].".png";
if($type == "produits")$nom = "../ressources/produit/".$nom_produit.".png";


$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

if ($_FILES['icone']['error'] == 0){

  $extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
  if ( in_array($extension_upload,$extensions_valides)){echo "Extension correcte<br>";

    if ($_FILES['icone']['size'] > $maxsize)
      $erreur = "Le fichier est trop gros";

      if (file_exists($nom)) {
          echo "L'image existe.<br>";
          unlink($nom);
          $resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom);
          if($resultat) echo "Transfert réussi <br>";
        } else {
          echo "L'image n'existe pas.";
          $resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom);
          if ($resultat) echo"Transfert réussi <br>";
        }
  }else{
  $erreur = "Erreur lors du transfert";
  }
}

echo($erreur);
}


////traite le formulaire "modifier produits"

function save_produit(){
  $nom = $_POST['nom'];
  $ID_produit = $_POST['ID_produit'];
  $ID_pfh = $_SESSION["ID_pfh"];
  $prix = $_POST['prix'];
  $quantite = $_POST['quantite'];
  $bdd = connexion_bdd();

  if(!empty($nom)){
    $req = $bdd->prepare('UPDATE produit SET nom = :nom , img = :nom WHERE ID_pfh = :id AND ID_produit = :IDproduit');
    $req->execute(array(
      'id' => $ID_pfh,
      'nom' => $nom,
      'IDproduit' => $ID_produit
    ));
    echo("caca");
    $req->closeCursor();
  }else {
    echo('il faut remplire le nom');
  }

  if(!empty($prix) && !empty($prix)){
    $req = $bdd->prepare('UPDATE ligne_produit SET prix = :prix , quantite = :quantite WHERE ID_pfh = :id AND ID_produit = :IDproduit');
    $req->execute(array(
      'id' => $ID_pfh,
      'prix' => $prix,
      'quantite' => $quantite,
      'IDproduit' => $ID_produit
    ));
    $req->closeCursor();
  }else {
    echo('il faut remplire le prix est la quantite');

  }
  echo('produit mise a jour');
}

//traite le formulaire "modifier description"

function save_Descript(){
	$descript = $_POST['descript'];
	$bdd = connexion_bdd();
	$id = $_SESSION["ID_pfh"];
	$req = $bdd->prepare('UPDATE pfh SET description = :descript WHERE ID_pfh = :id');
	$req->execute(array(
	  'id' => $id,
	  'descript' => $descript
	));
	$req->closeCursor();
	echo('description mise a jour');

}


//traite le formulaire "modifier solde utilisateur"
function save_Solde(){
$old_Solde = $_POST['old_Solde'];
$transaction = $_POST['transaction'];
$id = $_POST["ID_user"];



if ($_POST['checkbox'] == "+") {
  $newSolde = $old_Solde + $transaction;

}else{
  $newSolde = $old_Solde - $transaction;
}
intval($newSolde);



$bdd = connexion_bdd();
$req = $bdd->prepare('UPDATE user SET solde = :newSolde  WHERE ID_user = :id');
$req->execute(array(
  'id' => $id,
  ':newSolde' => $newSolde
));
echo($newSolde);
$req->closeCursor();
}

//
function catch_descript(){


$bdd = connexion_bdd();
$id = $_SESSION["ID_pfh"];
$req = $bdd->prepare('SELECT description FROM pfh WHERE ID_pfh = :id');
$req->execute(array(
  'id' => $id
));
$donnees = $req->fetch();
$req->closeCursor();

return($donnees['description']);
}

//recup solde
function catch_solde(){

	$bdd = connexion_bdd();
	$id = $_SESSION["ID_pfh"];
	$req = $bdd->prepare('SELECT solde FROM pfh WHERE ID_pfh = :id');
		$req->execute(array(
	  'id' => $id
	));
	$donnees = $req->fetch();
	$req->closeCursor();

	return($donnees['solde']);
}


?>
