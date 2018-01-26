<?php
 var_dump($_SESSION['ID_pfh']);

  $bdd = connexion_bdd();

  $req = $bdd->prepare('SELECT c.ID_commande, dateadded, u.nom, u.prenom, quantite, p.nomproduit
                        FROM commande c
                        join user u on c.ID_user = u.ID_user
                        join ligne_commande lc on c.ID_commande = lc.ID_commande
                        join produit p on lc.ID_produit = p.ID_produit
                        where c.ID_buvette = :id
                        ORDER BY dateadded DESC');
  $req->execute(array(
    'id' => $_SESSION['ID_pfh']

  ));
  echo ('
  <table class="table table-hover">
      <thead>
        <tr>

          <th>#ID</th>
          <th>Nom</th>
          <th>prenom</th>
          <th>produit</th>
          <th>quantite</th>
          <th>date</th>
        </tr>
      </thead>
      <tbody>
      ');

    while ($donnees = $req->fetch())
    {
      echo ('<tr>
        <td>'.$donnees["ID_commande"].'</td>
        <td>'.$donnees["nom"].'</td>
        <td>'.$donnees["prenom"].'</td>
        <td>'.$donnees['nomproduit'].'</td>
        <td>'.$donnees['quantite'].'</td>
        <td>'.$donnees['dateadded'].'</td>
      </tr>
      ');
    }


echo ('</tbody>
</table>');

?>
