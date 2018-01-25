<?php
$bdd = connexion_bdd();
$old_Solde = $_POST['old_Solde'];
$id = $_POST["ID_user"];



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
		$prix = $result["prix"];
		$quantite = $result["quantite"] - $_POST["quantite"];
	}

	for ($i=0; $i<$_POST["quantite"]; $i++) {
    	$newSolde = $newSolde - $prix;
	}
	
	$req = $bdd->prepare('UPDATE ligne_produit SET quantite = :quantite WHERE ID_produit = :ID_produit');
	$req->execute(array(
	  'ID_produit' => $ID_produit,
	  'quantite' => $quantite
	));
	$req->closeCursor();

}


$req = $bdd->prepare('UPDATE user SET solde = :newSolde  WHERE ID_user = :id');
$req->execute(array(
  'id' => $id,
  ':newSolde' => $newSolde
));
echo($newSolde);
$req->closeCursor();



header('Location:./index.php?page=buvette');

?>
