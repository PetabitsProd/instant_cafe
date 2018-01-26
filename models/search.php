<?php
require("config.php");


if (isset($_GET['term'])){
    $return_arr = array();

    try {
        $conn = connexion_bdd();
        
        $stmt = $conn->prepare('SELECT * FROM user WHERE nom LIKE :term');
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
        
        while($row = $stmt->fetch()) {
            $return_arr[] =  $row['nom'].' '.$row['prenom'];
        }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode(array_unique($return_arr));
}

?>