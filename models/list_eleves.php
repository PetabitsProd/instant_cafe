<?php
	$bdd = connexion_bdd();

	$req1 = $bdd->query('SELECT nom, prenom, semestre, ID_user, ID_pfh FROM user WHERE semestre = 4 AND ID_pfh IS NULL');
	while ($result = $req1->fetch()) {
			$nom = $result["nom"];
			$prenom = $result["prenom"];
			$iduser = $result["ID_user"];
			echo '<INPUT type="checkbox" name="iduser" value='.$iduser.'> '.$prenom.' '.$nom.'';
			echo '<br>';
	}
 ?>
