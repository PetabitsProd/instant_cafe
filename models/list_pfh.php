<?php
	$bdd = connexion_bdd();
	$req = $bdd->query('SELECT nom FROM pfh');
	while ($result = $req->fetch()) {
			$nom = $result["nom"];
				// echo '<form action="./controllers/supprimer_profil.php" method="POST">';
				// echo '<INPUT type="button" name="profil" value='.$nom.'>';
				// echo '</form>';
				// echo '<br>';
			echo '<li class="nav-item">';
			echo '<a class="nav-link" href="./controllers/supprimer_profil.php?profil='.$nom.'">'.$nom.'</a>';
			echo '</li>';
	}
	$req->closeCursor();
?>
