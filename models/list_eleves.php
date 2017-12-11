<?php 
	$bdd = connexion_bdd();

	$req1 = $bdd->query('SELECT nom, prenom, semestre, ID_user FROM user');
	while ($result = $req1->fetch()) {
		if($result["semestre"] == '4') {
			$nom = $result["nom"];
			$prenom = $result["prenom"];
			$iduser = $result["ID_user"];
			echo '<INPUT type="checkbox" name="iduser" value='.$iduser.'> '.$prenom.' '.$nom.'';
			echo '<br>';

		}
	}
 ?>
	