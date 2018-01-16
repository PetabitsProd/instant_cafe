<?php
$old_password = $_GET["old_password"];
$password = $_GET["password"];
$new_password = $_GET["new_password"];
changer_mdp($old_password, $password, $new_password);
?>
