<?php
$key = $_GET["key"];
$mail = $_GET["mail"];
$password = $_GET["password"];
$repassword = $_GET["re_password"];
//require('fonction.php');
verif_inscription($mail, $password, $repassword ,$key);
?>
