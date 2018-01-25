<?php

if (empty($_SESSION['prenom'])){
  echo('<ul class="navbar-nav mr-right">
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#connexion" href="">Connexion</a>
          </li>
        </ul>
      </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Veuillez vous connecter :</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-signin" action="./index.php?page=connexion" method="POST">
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Adresse email" required>
          <br><label for="inputPassword"  class="sr-only" >Password</label>
          <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Mot de passe" required>
          <br>
          <button class="btn btn-lg btn-primary btn-block" name="submit" value="submit" type="submit">Connexion</button>
        </form>
        </div>
      </div>
    </div>
  </div>
    ');
}else{

  if ($_SESSION['type'] == 'client') {
    $adresse = './index.php?page=accueil_membre';
    $titre = "Mon compte";
  } else if ($_SESSION['type'] == 'admin') {
    $adresse = './index.php?page=admin';
    $titre = "Gestion des PFH";
  }

  if (isset($_SESSION['ID_pfh']) && $_SESSION['ID_pfh'] !== "") {
    $bouton_buvette = '<li class="nav-item"><a class="btn btn-primary" href="./index.php?page=buvette">Buvette</a></li>';
    $bouton_fermer = '<li class="nav-item"><a class="btn btn-danger" href="./index.php?page=fermer">Fermer Buvette</a></li>';
  } else {
    $bouton_buvette = '';
    $bouton_fermer = '';
  }

  $bdd = connexion_bdd();
  $req = $bdd->prepare('SELECT * FROM user WHERE ID_user = :id');
  $req->execute(array(
    'id' => $_SESSION["ID_user"]
  ));
  while ($result = $req->fetch())
  { 
    echo('<ul class="navbar-nav mr-right">
            <li class="nav-item">
              <a class="nav-link" href="#">Solde: '.$result["solde"].'€</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                '.$_SESSION["prenom"].'
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="'.$adresse.'">'.$titre.'</a>
                <a class="dropdown-item" href="?page=changer_mdp">Changer MDP</a>
              <div class="dropdown-divider"></div>
                <a href="./index.php?page=deconnexion" class="dropdown-item">Déconnexion</a>
              </div>
            </li>
            '.$bouton_buvette.'
            '.$bouton_fermer.'
          </ul>
        </div>
      </nav>');
  }
}
 ?>
