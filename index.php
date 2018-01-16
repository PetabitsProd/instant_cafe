<?php
//routeur
require('models/config.php');
require('models/fonction.php');

session_start();

$page='accueil';

if (!empty($_GET['page'])){
  $page = $_GET['page'];
}

require('./views/corps.php');

 ?>
