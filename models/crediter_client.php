<?php
  echo'
  <center>
  <form method="post" action="./index.php?page=new_solde">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">€</span>
      </div>
      <input type="hidden" name="requete" value="+">
      <input type="text" class="form-control" name="transaction" aria-label="Amount (to the nearest dollar)">
      <div class="input-group-append">
        <span class="input-group-text">.00</span>
      </div>
    </div>
    <br>
    <div class="form-row">
          <div class="form-group col-md-11">
            <label for="inputNomd">Nom du client :</label>
            <br>
            <input type="text" name="client" class="inputNomd" id="inputNomd" placeholder="Nom du client"required>
            <br>
            <br>
            <button class="btn btn-primary" name="submit" value"submit" type="submit">Rechercher</button>
          </div>
    </div>
  </form>
  </center>
  <script type="text/javascript">
$(function() {
    $( ".inputNomd" ).autocomplete({
        source: \'models/search.php\',
        minLength: 3
    });
});
</script>';
?>