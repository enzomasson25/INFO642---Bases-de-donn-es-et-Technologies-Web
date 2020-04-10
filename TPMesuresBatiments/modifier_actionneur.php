<?php 

	header('Location: http://localhost/GestionMesuresBatiments/gestion_batiment.php?page=3');

	if ($_POST['nom']!="" && $_POST['type']!="" && $_POST['description']!="" && $_POST['etat']!="") {

		include("connexion_bdd.php");

		$nom = $_POST['nom'];
		$type = $_POST['type'];
		$description = $_POST['description'];
		$etat = $_POST['etat'];
		
		$sql =  "UPDATE actionneur
				SET type_actionneur = '$type', description = '$description', etat = '$etat'
				WHERE nom = '$nom'";

		$sth = $bdd->prepare($sql);
		$sth->execute();
		
	}

	exit();

?>