<?php 
session_start();
header('Location: http://localhost/GestionMesuresBatiments/gestion_batiment.php');

session_unset();
exit();
?>