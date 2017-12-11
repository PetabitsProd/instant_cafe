<form action="./controllers/creer_groupe.php" method="POST" enctype="multipart/form-data">
	<br>
	<textarea name="nom" placeholder="Nom du projet"></textarea>
	<br>
	<?php 
		include('./models/list_eleves.php');
	 ?>
	<input type="submit" name="Valider">
</form>