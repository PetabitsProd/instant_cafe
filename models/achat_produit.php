<?php
  $bdd = connexion_bdd();
  $ID_user = $_POST["ID_user"];
  $req = $bdd->prepare('SELECT * FROM user WHERE ID_user = :ID_user');
  $req->execute(array(
    'ID_user' => $ID_user

  ));

  while ($donnees = $req->fetch())
  { 
    echo '
    <br>
    <div class="form-group">ph
      <center><h4>Le solde de '.$donnees['nom'].' '.$donnees['prenom'].' est de : '.$donnees['solde'].' €</h4></center>
    </div>';
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
                  echo '<script>
                    document.addEventListener("change", function(){
                      var truc = document.getElementById("slider'.$result2['nom'].'").value;
                      document.getElementById("'.$result2['nom'].'").innerHTML = truc;
                    }); 
                  </script>
                  <div class="container">
                      <div class="jumbotron">
                          <div class="container">
                            <div class="row">
                              <form method="post" action="./index.php?page=new_solde">
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
                            <input type="range" name="quantite" id="slider'.$result2['nom'].'" value="0" min="0" max="5"  />
                            <input type="hidden" name="ID_produit" value="'.$result2['ID_produit'].'" />
                            <span id="'.$result2['nom'].'">0</span>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="old_Solde" value="'.$donnees['solde'].'" />
                      <input type="hidden" name="ID_user" value="'.$donnees['ID_user'].'" />
                      <input type="hidden" name="requete" value="-" />
                      <br>
                      <button type="submit" value="submit" class="btn btn-primary">Valider</button>
                      </form>';
          }
        }
    }

  }
?>
