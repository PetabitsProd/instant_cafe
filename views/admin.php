<div class="row">
  <div class="col-md-2">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="nav flex-column">
          <li class="nav-item">
                <?php include('./models/list_pfh.php'); ?>
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
       <br>
       <form action="./controllers/add_user.php" method="POST" enctype="multipart/form-data">
        <div>
          <label for="add_user">Ajouter des utilisateurs : </label>
          <input type="file" class="form-control-file" id="add_user" name="add_user" accept=".csv">
        </div>
        <br>
        <div>
          <input type="submit" class="btn btn-primary">
        </div>
       </form>
    </div>
  </div>
</div>
