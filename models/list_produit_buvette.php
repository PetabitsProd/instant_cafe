<?php
	$bdd = connexion_bdd();
	$req = $bdd->prepare('SELECT nom, quantite, prix, produit.ID_produit FROM produit INNER JOIN ligne_produit ON produit.ID_produit = ligne_produit.ID_produit WHERE ID_pfh = :id');
	$req->execute(array(
		'id' => $_SESSION['ID_pfh']
	));
	while ($result = $req->fetch()) {
			$nom = $result["nom"];
        echo '<tr>
  							<th scope="row">'.$nom.'</th>
  								<td>'.$result["quantite"].'</td>
                  <td>'.$result["prix"].'</td>
  								<td class="inline">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modifier'.$result["ID_produit"].'">
									  Modifier le produit
									</button>
  								<form class="inline" action="./index.php?page=supprimer_produit" method="POST">
  									<input type="hidden" name="id_produit" value="'.$result["ID_produit"].'">
  									<button class="btn btn-danger" type="submit">Supprimer</button>
  								</form>
  								</td>
  						</tr>

							<!-- Modal -->
							<div class="modal fade" id="modifier'.$result["ID_produit"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLongTitle">Modifier le produit :</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
										<form method="post" action="./index.php?page=modifier_produit">
											<div class="form-group">
												<label for="usr">Nom :</label>
												<input type="text" value="'.$result['nom'].'" class="form-control" name="nom">
											</div>
											<div class="form-group">
												<label for="usr">prix :</label>
												<input type="text" value="'.$result['prix'].'"€ class="form-control" name="prix">
											</div>
											<div class="form-group">
												<label for="usr">stock :</label>
												<input type="number" value="'.$result['quantite'].'" class="form-control" name="quantite">
											</div>

							      </div>
							      <div class="modal-footer">
										<input type="hidden" name="ID_produit" value="'.$result['ID_produit'].'" />
										<button type="submit" value="submit" class="btn btn-primary">Modifier</button>
										</form>
							      </div>
							    </div>
							  </div>
							</div>';
}
?>
