<?php

$bdd = connexion_bdd();
$nom = $_POST["client"];
$req = $bdd->prepare('SELECT * FROM user WHERE nom = :nom');
$req->execute(array(
  'nom' => $nom

));

while ($donnees = $req->fetch())
{
  echo ('
  <div class="jumbotron">
    <div class="container">
      <div class="row">
      <form method="post" action="./save_Solde.php">
        <div class="form-group">
          <label for="usr">'.$donnees['nom'].' '.$donnees['prenom'].' solde actuel :'.$donnees['solde'].' </label>
          <input type="text" value="0" class="form-control" name="transaction">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="checkbox" value="-">-</label>
        </div>
        <div class="checkbox">
        <label><input type="checkbox" name="checkbox" value="+">+</label>
        </div>
        <input type="hidden" name="old_Solde" value="'.$donnees['solde'].'" />
        <input type="hidden" name="ID_user" value="'.$donnees['ID_user'].'" />
        <button type="submit" value="submit" class="btn btn-primary">modifié</button>
      </form>
    </div>
  </div>

');
}

 ?>
