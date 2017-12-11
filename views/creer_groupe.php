<div class="container">
	<form action="./controllers/creer_groupe.php" method="POST" enctype="multipart/form-data">
		<br>
		<input type="text" name="nom" placeholder="Nom du projet">
		<br>
		<?php
			include('./models/list_eleves.php');
		 ?>
		<input type="submit" name="Valider">
	</form>
</div>
