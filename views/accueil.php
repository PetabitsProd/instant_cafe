<div class="container">
  <br>
  <h1>Bienvenue !</h1>
  <form action="./controllers/add_user.php" method="POST" enctype="multipart/form-data">
   <div>
     <label for="add_user">Ajouter des utilisateurs : </label>
     <input type="file" class="form-control-file" id="add_user" name="add_user" accept=".csv">
   </div>
   <br>
   <div>
     <button type="button" class="btn btn-primary">Exécuter</button>
   </div>
  </form>
</div>
