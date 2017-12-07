<?php
session_start();
session_destroy();
print_r($_SESSION);
header('Location: http://instantcafe:8888');
?>
