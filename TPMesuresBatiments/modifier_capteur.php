<?php 
	header('Location: http://localhost/GestionMesuresBatiments/gestion_batiment.php?page=2');


	include("connexion_bdd.php");


	if(isset($_POST['nom']) && isset($_POST['1']) && isset($_POST['2']) && isset($_POST['3']) && isset($_POST['4']) ){

		$nom = $_POST['nom'];
		$type_capteur = $_POST['1'];
		$unite = $_POST['2'];
		$valmin = $_POST['3'];
		$valmax = $_POST['4'];
	}

	$sql =  "UPDATE capteur
             SET type_capteur = '$type_capteur',
             unite = '$unite',
             valmin = '$valmin',
             valmax = '$valmax'
             WHERE nom = '$nom'";

    echo $sql;
	$sth = $bdd->prepare($sql);
	$sth->execute();

	exit();
?>