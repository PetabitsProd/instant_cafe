<?php
//routeur
require('controllers/config.php');
require('controllers/fonction.php');

session_start();

$page='accueil';

if (!empty($_GET['page'])){
  $page = $_GET['page'];
} else {

}

require('./views/corps.php');

 ?>
