<?php 
  $complet = explode(' ', $_POST["client"]);
  $nom = $complet[0];
  $prenom = $complet[1];


  $bdd = connexion_bdd();
  $req = $bdd->prepare('SELECT * FROM user WHERE nom = :nom AND prenom = :prenom');
  $req->execute(array(
    'nom' => $nom,
    'prenom' => $prenom
  ));

  while ($result = $req->fetch())
  { 
    $id = $result["ID_user"];
  }
  $req->closeCursor();

  $req = $bdd->prepare('SELECT * FROM user WHERE ID_user = :id');
  $req->execute(array(
    'id' => $id
  ));
  while ($result = $req->fetch())
  { 
    echo '<center>
      <br>
      <h4>Entrez le montant à créditer sur le compte</h4>
      <br>
      <form method="post" action="./index.php?page=new_solde">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">€</span>
          </div>
          <input type="hidden" name="requete" value="+">
          <input type="text" class="form-control" name="transaction" aria-label="Amount (to the nearest dollar)">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <input type="hidden" name="ID_user" value="'.$result["ID_user"].'">
        <input type="hidden" name="old_Solde" value="'.$result["solde"].'">
        <input type="submit" name="valider" value="Valider">
      </form>
    <br>
    <br>
    <form  method="POST" action="./index.php?page=achat_produit">
        <input type="hidden" name="client" value="'.$nom.'">
        <input type="submit" name="valider" value="Débiter un client">
        <input type="hidden" name="ID_user" value="'.$result["ID_user"].'">
        <input type="hidden" name="old_Solde" value="'.$result["solde"].'">
      </div>
    </form>
    </center>';

  }
?>
