<?php
$old_Solde = $_POST['old_Solde'];
$transaction = $_POST['transaction'];
$id = $_POST["ID_user"];

if ($_POST['checkbox'] == "+") {
  $newSolde = $old_Solde + $transaction;

}else{
  $newSolde = $old_Solde - $transaction;
}
intval($newSolde);

$bdd = connexion_bdd();
$req = $bdd->prepare('UPDATE user SET solde = :newSolde  WHERE ID_user = :id');
$req->execute(array(
  'id' => $id,
  ':newSolde' => $newSolde
));
echo($newSolde);
$req->closeCursor();

header('Location:./index.php?page=buvette');

?>
