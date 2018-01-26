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
      <?php require('./models/liste_eleve_pfh.php') ?>
    </div>
  </div>
</div>
