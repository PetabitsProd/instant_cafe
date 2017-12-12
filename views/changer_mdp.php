<div class="container">
  <div class="form-area">
    <br style="clear:both">
    <h3 style="margin-bottom: 25px; text-align: center;">Changer le mot de passe</h3>
              <form action="index.php?" method="GET">
                <input type="hidden" name="page" value="verif_mdp">
                <div class="form-group">
                   <label for="exampleInputPassword1">Ancien mot de Passe :</label>
                   <input type="password" name="old_password" class="form-control" id="exampleInputPassword1" placeholder="******">
                </div>

                <div class="form-group">
                   <label for="exampleInputPassword1">Nouveau mot de passe :</label>
                   <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="******">
                </div>

                <div class="form-group">
                   <label for="exampleInputPassword1">Confirmer nouveau mot de passe :</label>
                   <input type="password" name="new_password" class="form-control" id="exampleInputPassword1" placeholder="******">
                </div>

                <button type="submit" class="btn btn-primary pull-right" name="valider">Envoyer</button>
  </div>
</div>
