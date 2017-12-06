<?php

if (empty($_SESSION['nom']) && empty($_SESSION['prenom'])){
  echo('
    <ul class="navbar-nav mr-right">
      <!--li class="nav-item">
        <a class="nav-link" href="?page=inscription">Inscription</a>
      </li-->
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#connexion" href="">Connexion</a>
      </li>
    </ul>
    </div>
    </div>
  </nav>
    ');
}else{
  echo("<a href='?page=disconnect' class='btn btn-primary'>Déconnexion</a></div>
  </div>
</nav>");
}
 ?>
