<?php


  $bdd = connexion_bdd();

  $req = $bdd->prepare('SELECT count(*), dateadded FROM commande WHERE ID_buvette = :id GROUP BY DAY(dateadded)');
  $req->execute(array(
    'id' => $_SESSION['ID_pfh']

  ));
  echo "toto";
  $dataPoints = array();
    while ($donnees = $req->fetch())
    {

      array_push($dataPoints,array("label"=>substr($donnees['dateadded'],0, -9) , "y"=>$donnees['count(*)']) );

    var_dump($dataPoints);
    }



 ?>
   <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <div class="col-md-1"></div>
   <div class="col-md-10">
     <div id="chartContainer2" style="height:100%; width:100%;"></div>

   </div>
   <div class="col-md-1"></div>

 <script>

 var chart = new CanvasJS.Chart("chartContainer2", {
   animationEnabled: true,
   exportEnabled: true,
   theme: "dark2", // "light1", "light2", "dark1", "dark2"
   title:{
     text: "Ventes par jour"
   },
   data: [{
     type: "line", //change type to bar, line, area, pie, etc
     //indexLabel: "{y}", //Shows y value on all Data Points
     indexLabelFontColor: "#5A5757",
     indexLabelPlacement: "outside",
     dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
   }]
 });
 chart.render();


 </script>
