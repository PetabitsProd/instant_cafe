<div class="container">

  <div class="form-area">
    <br style="clear:both">
    <h3 style="margin-bottom: 25px; text-align: center;">Indiquez votre adresse mail afin de recevoir un mail de remise à zéro du MDP</h3>
              <form action="./controllers/mdp_oublie.php" method="GET">
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse email :</label>
                    <input type="email"  name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exemple@intechinfo.fr">
                    <small id="emailHelp" class="form-text text-muted">Seule les adresses @intechinfo.fr ou @esiea.fr sont valide</small>
                </div>
                <button type="submit" class="btn btn-primary pull-right" name="valider">Envoyer</button>
  </div>
</div>
