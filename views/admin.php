<div class="row">
  <div class="col-md-2">
      <nav class="navbar navbar-light bg-light">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">Active</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a href="../index.php?page=creer_groupe" class="btn btn-primary">Créer groupe</a>
          </li>
        </ul>
    </nav>
  </div>

  <div class="col-md-10">
    <div class="container-fluid">
      <br>
        <h1>Panneau administrateur</h1>
      <?php
        echo("Bonjour ".$_SESSION['prenom']);
       ?>
       <br>

    </div>
  </div>
</div>
