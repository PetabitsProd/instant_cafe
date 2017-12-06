<div class="container">

  <div class="form-area">
    <br style="clear:both">
    <h3 style="margin-bottom: 25px; text-align: center;">Veuillez vous inscrire</h3>
              <form action="index.php?" method="GET">
                <input type="hidden" name="page" value="verif_inscription">
                <input type="hidden" name="key" value="<?php $key = $_GET['key']; echo $key; ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse email :</label>
                    <input type="email"  name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exemple@intechinfo.fr">
                    <small id="emailHelp" class="form-text text-muted">Seule les adresses @intechinfo.fr ou @esiea.fr sont valide</small>
                </div>

                <div class="form-group">
                   <label for="exampleInputPassword1">Mot de Passe :</label>
                   <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="******">
                </div>

                <div class="form-group">
                   <label for="exampleInputPassword1">Confirmation de mot de passe :</label>
                   <input type="password" name="re_password" class="form-control" id="exampleInputPassword1" placeholder="******">
                </div>

                <button type="submit" class="btn btn-primary pull-right" name="valider">Envoyer</button>
  </div>
</div>
</div>
