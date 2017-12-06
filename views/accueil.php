<div class="container">
  <br>
  <h1>Bienvenue !</h1>
  <form action="./controllers/add_user.php" method="POST" enctype="multipart/form-data">
   <div>
     <label for="add_user">Ajouter des utilisateurs : </label>
     <input type="file" id="add_user" name="add_user" accept=".csv">
   </div>
   <div>
     <button>Envoyer</button>
   </div>
  </form>
</div>
