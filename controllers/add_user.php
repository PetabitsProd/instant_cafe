<?php

if(isset($_FILES['add_user']))
{
     $dossier = '../ressources/liste/';
     $fichier = basename($_FILES['add_user']['name']);
     if(move_uploaded_file($_FILES['add_user']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}

$fichier = "../ressources/liste/user_list.csv";
$fichiercsv = fopen($fichier,"r");

$ligne = 0;
while(($user[$ligne] = fgetcsv($fichiercsv,1000,";")) !== FALSE)
{
  $ligne++;
}

require("../models/config.php");
$bdd = connexion_bdd();

$requette = $bdd->prepare('INSERT into user (nom , prenom , email , password, solde, semestre) VALUES (:nom, :prenom, :email, :password, :solde, :semestre)');

foreach ($user as $value) {
	$requette->execute(array(
		'nom' => $value['0'],
		'prenom' => $value['1'],
		'email' => $value['2'],
		'password' => "ok",
		'solde' => 0,
    'semestre' => $value['3'],
		));
}

	echo "Tout va bien";

  //require('send_mail.php');
  //send_mail();

  header("Location: ../index.php?page=accueil");

?>
