<?php
	$bdd = connexion_bdd();
	$req = $bdd->query('SELECT nom, description, id_pfh FROM pfh');
	while ($result = $req->fetch()) {
			$nom = $result["nom"];
			$desc = $result["description"];
			echo '<tr>
							<th scope="row">'.$nom.'</th>
								<td>'.$result["description"].'</td>
								<td class="inline">
								<!--form  action="./index.php?page=modifier_liste" method="POST">
									<input type="hidden" name="id" value="'.$result["id_pfh"].'">
									<button class="btn btn-primary" type="submit">Modifier</button>
								</form-->
								<form class="inline" action="./index.php?page=supprimer_liste" method="POST">
									<input type="hidden" name="id_liste" value="'.$result["id_pfh"].'">
									<button class="btn btn-danger" type="submit">Supprimer</button>
								</form>
								</td>
						</tr>';
			;
	}
	$req->closeCursor();
?>
