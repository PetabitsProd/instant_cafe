<?php

$bdd = connexion_bdd();
$id = $_SESSION["ID_pfh"];
$req = $bdd->prepare('SELECT * FROM ligne_produit lp INNER JOIN produit p ON lp.ID_produit  = p.ID_produit WHERE ID_pfh = :id');
$req->execute(array(
  'id' => $id
));

while ($donnees = $req->fetch())
{
echo('
<div class="jumbotron">
  <div class="container">
    <div class="row">
      <img src="./ressources/produit/'.$donnees['img'].'">

      <form method="post" action="./controllers/save_Image.php" enctype="multipart/form-data">
        <label for="mon_fichier">Fichier (tous formats | max. 1 Mo) :</label><br />
        <input type="hidden" name="type" value="produits" />
        <input type="hidden" name="nom_produit" value="'.$donnees['nom'].'" />
        <input type="file" name="icone" id="mon_fichier" /><br />
        <input type="submit" name="submit" value="Envoyer" />
      </form>
      <form method="post" action="./controllers/save_produit.php">
        <div class="form-group">
          <label for="usr">Nom :</label>
          <input type="text" value="'.$donnees['nom'].'" class="form-control" name="nom">
        </div>
        <div class="form-group">
          <label for="usr">prix :</label>
          <input type="text" value="'.$donnees['prix'].'"€ class="form-control" name="prix">
        </div>
        <div class="form-group">
          <label for="usr">stock :</label>
          <input type="text" value="'.$donnees['quantite'].'" class="form-control" name="quantite">
        </div>
        <input type="hidden" name="ID_produit" value="'.$donnees['ID_produit'].'" />
        <button type="submit" value="submit" class="btn btn-primary">modifié</button>
      </form>
    </div>
  </div>
</div>
');

}

$req->closeCursor();


 ?>
