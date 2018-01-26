	<div class="modal-body">
        <form action="index.php?page=creer_pfh" onsubmit="return myJavascriptFunction()" method="POST">
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
                	<label for="inputNomd">Nom du client :</label>
					<br>
					<input type="text" name="client" id="inputNomd" class="inputNomd" placeholder="Nom du client">
					<button onclick="ajouter()" class="btn btn-primary" type="button">Ajouter</button>
					<p id="ajouter"></p>
					<input type="hidden" name="nomComplet" id="unique" value="">
                </ul>
              </div>
            </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" name="submit" value="submit" type="submit">Valider</button>
        </form>
      </div>
      	<script>
			$(function() {
			    $( ".inputNomd" ).autocomplete({
			        source: './models/search.php',
			        position: { my : "right top", at: "right bottom" },
			        minLength: 3
			    });
			});
		</script>
		<script type="text/javascript">

			let values= [];
			function ajouter() {

				document.getElementById("ajouter").innerHTML = "";
			    values.push(document.getElementById("inputNomd").value);
			    for (let i = 0; i < values.length; i++) document.getElementById("ajouter").innerHTML += values[i]+"<br>";
	    
			}

			function myJavascriptFunction() { 

				let myVar = "";
	  			for (let i = 0; i < values.length; i++) myVar += values[i]+";";
	  				document.getElementById('unique').value = myVar;
					return true; 
			}
		</script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link rel="stylesheet" href="./ressources/style.css">