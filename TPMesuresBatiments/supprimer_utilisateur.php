<?php 
	header('Location: http://localhost/GestionMesuresBatiments/gestion_batiment.php');

	if (isset($_POST['pseudo'])) {
		include("connexion_bdd.php");

		$pseudo = $_POST['pseudo'];
		
		$sql =  "DELETE FROM utilisateur
				WHERE pseudo = '$pseudo'";

		$sth = $bdd->prepare($sql);
		$sth->execute();
	}

	exit();
?>