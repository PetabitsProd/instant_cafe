<div class="col-md-12">
    <div class="container">
        <h1>Panneau administrateur</h1>
      <?php
        echo("Bonjour ".$_SESSION['prenom']);
       ?>
       <br>
       <br>
       <h4>Voici les PFH déjà créés :</h4>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_pfh">
         Créer un PFH
       </button>
       <br>
       <table class="table table-hover">
               <thead>
                 <tr>
                   <th scope="col">Nom</th>
                   <th scope="col">Description</th>
                   <th scope="col">Action</th>
                 </tr>
               </thead>
               <tbody>
                 <?php require('./models/list_pfh.php'); ?>
               </tbody>
             </table>
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


<!-- Modal -->
<div class="modal fade" id="add_pfh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire de création de PFH :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php?page=creer_pfh" method="POST">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputNom">Nom :</label>
              <input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom du projet"required>
            </div>
            <div class="form-group col-md-12">
              <label for="inputlogo">Logo :</label><br>
              <input type="file" name="img" id="inputlogo" >
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputdesc">Description :</label>
              <textarea class="form-control" name="desc" id="inputdesc" rows="4" placeholder="Description du projet" required></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputuser">Ajouter des étudiants :</label>
                <ul>
                  <?php require('./models/list_eleves.php') ?>
                </ul>
              </div>
            </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" name="submit" value"submit" type="submit">Valider</button>
        </form>
      </div>
    </div>
  </div>
</div>
