<?php

function modifier_produit(){
  $nom = $_POST['nom_produit'];
  $ID_produit = $_POST['ID_produit'];
  $ID_pfh = $_SESSION["ID_pfh"];
  $prix = $_POST['prix'];
  $quantite = $_POST['quantite'];
  $bdd = connexion_bdd();

  if(!empty($nom)){
    $req = $bdd->prepare('UPDATE produit SET nom = :nom , img = :nom WHERE ID_pfh = :id AND ID_produit = :IDproduit');
    $req->execute(array(
      'id' => $ID_pfh,
      'nom' => $nom,
      'IDproduit' => $ID_produit
    ));
    $req->closeCursor();
  }else {
    echo('il faut remplire le nom');
  }

  if(!empty($prix) && !empty($prix)){
    $req = $bdd->prepare('UPDATE ligne_produit SET prix = :prix , quantite = :quantite WHERE ID_pfh = :id AND ID_produit = :IDproduit');
    $req->execute(array(
      'id' => $ID_pfh,
      'prix' => $prix,
      'quantite' => $quantite,
      'IDproduit' => $ID_produit
    ));
    $req->closeCursor();
  }else {
    echo('il faut remplire le prix est la quantite');

  }
  echo('produit mise a jour');
}
modifier_produit();
header('Location:./index.php?page=buvette');
 ?>
