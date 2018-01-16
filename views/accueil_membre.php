<div class="container">
  <?php
  echo("<h1>Bonjour ".$_SESSION['prenom']."</h1><br>");
  require("./models/list_produits.php")
  ?>
</div>
