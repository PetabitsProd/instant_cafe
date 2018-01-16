<?php
	$bdd = connexion_bdd();

	$req = $bdd->query('SELECT ID_pfh, actif, nom FROM pfh WHERE actif = "oui"');
	while ($result = $req->fetch()) {
			$idpfh = $result["ID_pfh"];
			$req1 = $bdd->query('SELECT ID_produit, quantite FROM ligne_produit WHERE ID_pfh = '.$idpfh.'');
				echo '<div class="jumbotron">
							  <h1 class="display-3">La buvette de <strong>'.$result['nom'].'</strong> est ouverte</h1>
							  <p class="lead">Voici les produits que nous vendons :</p>
							  <hr class="my-4">
								<div class="card-deck">';
			$req2=$bdd->query('SELECT p.nom, lp.quantite FROM produit p JOIN ligne_produit lp ON lp.ID_produit = p.ID_produit WHERE ID_pfh = '.$idpfh);
			while ($result2= $req2->fetch()) {
				echo '<div class="card" style="max-width: 18rem;">
									<div class="card-header">
									<h4 class="card-title">'.$result2['nom'].'</h4>
									</div>
									<div class="card-body">
									<img class="card-img-top" src="./ressources/produits/'.$result2['nom'].'.png">
									</div>
									<div class="card-footer text-muted">
								    <p class="card-text">Il y en a encore '.$result2['quantite'].'</p>
								  </div>
							</div>';
			}
			$req1->closeCursor();
			echo '</div>
					</div>';


			// echo '<div class="jumbotron">
			// 			  <h1 class="display-3">Oh non !!</h1>
			// 			  <p class="lead">Il n"y a pas de buvette en cours ...</p>
			// 			  <hr class="my-4">
			// 			  	<p>Aucune de buvette n"est actuellement active, revenez plus tard.</p>
			// 			</div>';
}
?>
