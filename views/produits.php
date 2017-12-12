<div class="container">
	<?php
		echo("Bonjour ".$_SESSION['prenom']);
		echo("Voici les produits disponibles dans notre buvette");
		echo('<br>');
		include('./models/list_produits.php');
	?>
</div>
