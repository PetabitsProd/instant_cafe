<?php
  $bdd = connexion_bdd();

    echo '
    <br>
    <center>
    <form method="post" action="./index.php?page=new_solde">
      <div class="form-row">
            <div class="form-group col-md-11">
              <label for="inputNomd">Nom du client :</label>
              <br>
              <input type="text" name="client" class="inputNomd" id="inputNomd" placeholder="Nom du client"required>
              <br>
              <br>
            </div>
      </div>
    </center>
    <br>';

    $req3 = $bdd->query('SELECT ID_pfh, actif, nom FROM pfh WHERE actif = "oui"');
    while ($result = $req3->fetch()) {
        $idpfh = $result["ID_pfh"];
        $req2 = $bdd->query('SELECT p.nom, lp.quantite, lp.ID_produit FROM produit p JOIN ligne_produit lp ON lp.ID_produit = p.ID_produit WHERE ID_pfh = '.$idpfh);
        while ($result2= $req2->fetch()) {
          if($result2['quantite'] == 0) {
              echo '<div class="container">
                <div class="jumbotron">
                  <div class="container">
                    <div class="row">
                    <div class="card" style="max-width: 18rem;">
                      <div class="card-header">
                        <h4 class="card-title">'.$result2['nom'].'</h4>
                      </div>
                      <div class="card-body">
                        <img class="card-img-top" src="./ressources/produits/'.$result2['nom'].'.png">
                      </div>
                      <div class="card-footer text-muted">
                        <p class="card-text">Il n\'y a plus de ce produit en stock</p>
                      </div>
                    </div>';
          } else {
                  echo '
                  <div class="container">
                      <div class="jumbotron">
                          <div class="container">
                            <div class="row">
                                  <div class="card" style="max-width: 18rem;">
                                  <div class="card-header">
                                    <h4 class="card-title">'.$result2['nom'].'</h4>
                                  </div>
                                  <div class="card-body">
                                    <img class="card-img-top" src="./ressources/produits/'.$result2['nom'].'.png">
                                  </div>
                                  <div class="card-footer text-muted">
                                    <p class="card-text">Il y en a encore '.$result2['quantite'].'</p>
                                  </div>
                            </div>
                            <br>
                            <input type="number" name="quantite" value="0" min="0" max="10"  />
                            <input type="hidden" name="ID_produit" value="'.$result2['ID_produit'].'" />
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="requete" value="-" />
                      <br>
                      <button type="submit" value="submit" class="btn btn-primary">Valider</button>
                      </form>';
          }
        }
    }
?>
