<?php


  $bdd = connexion_bdd();

  $req = $bdd->prepare('SELECT * , count(*) FROM commande JOIN pfh on ID_buvette = ID_pfh GROUP BY ID_buvette');
  $req->execute(array(

  ));

  $dataPoints = array();
    while ($donnees = $req->fetch())
    {

      array_push($dataPoints,array("label"=>$donnees['nom'] , "y"=>$donnees['count(*)']) );

    }



 ?>
 <div id="chartContainer1" style="height: 370px; width: 80%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 <script>

 var chart = new CanvasJS.Chart("chartContainer1", {
 	animationEnabled: true,
 	exportEnabled: true,
 	theme: "dark2", // "light1", "light2", "dark1", "dark2"
 	title:{
 		text: "Ventes par buvette"
 	},
 	data: [{
 		type: "column", //change type to bar, line, area, pie, etc
 		//indexLabel: "{y}", //Shows y value on all Data Points
 		indexLabelFontColor: "#5A5757",
 		indexLabelPlacement: "outside",
 		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
 	}]
 });
 chart.render();


 </script>
