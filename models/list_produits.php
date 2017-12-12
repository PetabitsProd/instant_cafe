<?php	
	$bdd = connexion_bdd();
	$req = $bdd->query('SELECT ID_pfh, actif FROM pfh');

	while ($result = $req->fetch()) {
		if($result["actif"] == "oui") {
			$idpfh = $result["ID_pfh"];
			$req1 = $bdd->prepare('SELECT ID_produit, quantite FROM ligne_produit WHERE ID_pfh = :idpfh');
			$req1->execute(array(
					'idpfh' => $idpfh
			));


$req2=$bdd->query('SELECT p.nom, lp.quantite
FROM produit p JOIN ligne_produit lp ON lp.ID_produit = p.ID_produit;');

while ($result2= $req2->fetch()) {
	echo $result2['nom'].' '.$result2['quantite'].' <img src="./ressources/produits/'.$result2['nom'].'.png" width="200px" height="150px"><br>';
}
			$req1->closeCursor();
		}
	}
	$req->closeCursor();
?>