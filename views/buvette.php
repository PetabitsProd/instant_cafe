<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

<div class="container">
  <h4>Voici les produits de la buvette :</h4>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_pfh">
    Créer un produit
  </button>
  <br>
  <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Nom</th>
              <th scope="col">Quantité</th>
              <th scope="col">Prix</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php require('./models/list_produit_buvette.php'); ?>
          </tbody>
        </table>

    <h5>Créditer ou débiter un client :</h5>
      <form method="POST" action="./index.php?page=user">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNomd">Nom du client :</label>
            <input type="text" name="client" class="inputNomd" id="inputNomd" placeholder="Nom du client"required>
            <button class="btn btn-primary" name="submit" value"submit" type="submit">Rechercher</button>
          </div>
        </div>
      </form>
</div>


<!-- Modal -->
<div class="modal fade" id="add_pfh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire de création de produits :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php?page=creer_produit" method="POST" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputNom">Nom :</label>
              <input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom du produit"required>
            </div>

          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputquant">Quantité :</label>
              <input type="number" name="quantite" class="form-control" id="inputquant" value="1" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputprix">Prix :</label>
              <input type="number" name="prix" class="form-control" id="inputprix" value="1" required>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label for="inputlogo">Image :</label><br>
            <input type="file" name="img" id="inputlogo" >
          </div>
          <button class="btn btn-lg btn-primary btn-block" name="submit" value"submit" type="submit">Valider</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function() {
    $( ".inputNomd" ).autocomplete({
        source: 'models/search.php',
        minLength: 3
    });
});
</script>
