<?php

function modif_img($nom){

$erreur ="";
$maxsize = "999999999099";
//if($type == "logo")$nom = "../ressources/logo/".$_SESSION["ID_pfh"].".png";
//if($type == "produits")

$nom_produit = "./ressources/produits/".$nom.".png";
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

if ($_FILES['img']['error'] == 0){

  $extension_upload = strtolower(  substr(  strrchr($_FILES['img']['name'], '.')  ,1)  );
  if ( in_array($extension_upload,$extensions_valides)){echo "Extension correcte<br>";

    if ($_FILES['img']['size'] > $maxsize)
      $erreur = "Le fichier est trop gros";

      if (file_exists($nom_produit)) {
          echo "L'image existe.<br>";
          unlink($nom_produit);
          $resultat = move_uploaded_file($_FILES['img']['tmp_name'],$nom_produit);
          if($resultat) echo "Transfert réussi <br>";
        } else {
          echo "L'image n'existe pas.";
          $resultat = move_uploaded_file($_FILES['img']['tmp_name'],$nom_produit);
          if ($resultat) echo"Transfert réussi <br>";
        }
  }else{
  $erreur = "Erreur lors du transfert";
  }
}

echo($erreur);
}


 ?>
