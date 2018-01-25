<?php
echo '
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
    <input type="hidden" name="ID_user" value="'.$_POST["ID_user"].'">
    <input type="hidden" name="old_Solde" value="'.$_POST["solde"].'">
    <input type="submit" name="valider" value="Valider">
  </form>';
?>