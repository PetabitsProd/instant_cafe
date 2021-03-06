<?php

if (empty($_SESSION['prenom'])){
  echo('<ul class="navbar-nav mr-right">
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#connexion" href="">Connexion</a>
          </li>
        </ul>
      </div>
  </nav>
    ');
}else{

  if ($_SESSION['type'] == 'client') {
    $adresse = './index.php?page=accueil_membre';
    $titre = "Mon compte";
  } else if ($_SESSION['type'] == 'admin') {
    $adresse = './index.php?page=admin';
    $titre = "Gestion des PFH";
  }

  if (isset($_SESSION['id_pfh']) && $_SESSION['id_pfh'] !== "") {
    $bouton_buvette = '<li class="nav-item"><a class="btn btn-primary" href="./index.php?page=buvette">Buvette</a></li>';
  } else {
    $bouton_buvette = '';
  }

  echo('<ul class="navbar-nav mr-right">
          <li class="nav-item">
            <a class="nav-link" href="#">Solde: '.$_SESSION["solde"].'€</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              '.$_SESSION["prenom"].'
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="'.$adresse.'">'.$titre.'</a>
              <a class="dropdown-item" href="?page=changer_mdp">Changer MDP</a>
            <div class="dropdown-divider"></div>
              <a href="./controllers/deconnexion.php" class="dropdown-item">Déconnexion</a>
            </div>
          </li>
          '.$bouton_buvette.'
        </ul>
      </div>
    </nav>');
}
 ?>
