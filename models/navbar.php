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
  echo('<ul class="navbar-nav mr-right">
          <li class="nav-item">
            <a class="nav-link" href="#">Solde: '.$_SESSION["solde"].'€</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              '.$_SESSION["prenom"].'
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Mon compte</a>
              <a class="dropdown-item" href="?page=changer_mdp">Changer MDP</a>
            <div class="dropdown-divider"></div>
              <a href="./controllers/deconnexion.php" class="dropdown-item">Déconnexion</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>');
}
 ?>
