<?php
$bdd = connexion_bdd();

$complet = explode(' ', $_POST["client"]);
$nom = $complet[0];
$prenom = $complet[1];


$bdd = connexion_bdd();
$req = $bdd->prepare('SELECT * FROM user WHERE nom = :nom AND prenom = :prenom');
$req->execute(array(
  'nom' => $nom,
  'prenom' => $prenom
));

while ($result = $req->fetch()) { 
  $id = $result["ID_user"];
}
$req->closeCursor();

$req = $bdd->prepare('SELECT * FROM user WHERE ID_user = :id');
$req->execute(array(
  'id' => $id
));
while ($result = $req->fetch()) { 
  $old_Solde = $result["solde"];
}
$req->closeCursor();



if ($_POST['requete'] == "+") {
  $newSolde = $old_Solde + $_POST['transaction'];

}else{
	$ID_produit = $_POST["ID_produit"];
	$newSolde = $old_Solde;
	$req = $bdd->prepare('SELECT * FROM ligne_produit WHERE ID_produit = :ID_produit ');
	$req->execute(array(
	  'ID_produit' => $ID_produit,
	));
	while ($result = $req->fetch())
	{
		if($result["quantite"] >= $_POST["quantite"]) {
			$prix = $result["prix"];
			$quantite = $result["quantite"] - $_POST["quantite"];

			for ($i=0; $i<$_POST["quantite"]; $i++) {
	    	$newSolde = $newSolde - $prix;
			}
			
			$req = $bdd->prepare('UPDATE ligne_produit SET quantite = :quantite WHERE ID_produit = :ID_produit');
			$req->execute(array(
			  'ID_produit' => $ID_produit,
			  'quantite' => $quantite
			));
			$req->closeCursor();

		$req = $bdd->prepare('UPDATE user SET solde = :newSolde  WHERE ID_user = :id');
		$req->execute(array(
		  'id' => $id,
		  ':newSolde' => $newSolde
		));
		$req->closeCursor();

		$req = $bdd->prepare('INSERT INTO commande (date,ID_buvette,ID_user) VALUES (CURRENT_TIMESTAMP() , :ID_buvette , :ID_user)');
		$req->execute(array(
		  'ID_buvette' => $_SESSION['ID_pfh'],
		  'ID_user' => $id

		));
		$req->closeCursor();

		$last_id = $bdd->lastInsertId();

		$req = $bdd->prepare('INSERT INTO ligne_commande VALUES (:last_ID , :ID_produit , :quantite)');
		$req->execute(array(
		  'last_ID' => $last_id,
		  'ID_produit' => $ID_produit,
		  'quantite' => $_POST["quantite"]

		));
		$req->closeCursor();

		header('Location:./index.php?page=vente');

		} else {
				echo '<center>La quantité du produit demandé n\'est pas disponible</center>';
				require("./views/vente.php");

		}
	}
}
?>