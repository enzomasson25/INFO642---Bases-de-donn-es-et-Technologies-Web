<?php 
	header('Location: http://localhost/GestionMesuresBatiments/gestion_batiment.php');

	if (isset($_POST['pseudo']) && isset($_POST['mdp']) && $_POST['pseudo']!=""  && $_POST['mdp']!="") {

		include("connexion_bdd.php");

		$pseudo = $_POST['pseudo'];
		$mdp = $_POST['mdp'];

		if (isset($_POST['ajout_capteur'])) {
		$ajout_capteur = 1;
		}
		else {
		$ajout_capteur = 0;
		}

		if (isset($_POST['modifier_capteur'])) {
			$modifier_capteur = 1;
		}
		else {
			$modifier_capteur = 0;
		}

		if (isset($_POST['ajout_actionneur'])) {
			$ajout_actionneur = 1;
		}
		else {
			$ajout_actionneur = 0;
		}

		if (isset($_POST['modifier_actionneur'])) {
			$modifier_actionneur = 1;
		}
		else {
			$modifier_actionneur = 0;
		}

		if (isset($_POST['admin'])) {
			$admin = 1;
		}
		else {
			$admin = 0;
		}
	
		$sql =  "INSERT INTO utilisateur (pseudo,mdp,admin,ajout_capteur,modifier_capteur,ajout_actionneur,modifier_actionneur)
                VALUES ('$pseudo','$mdp',$admin,$ajout_capteur,$modifier_capteur,$ajout_actionneur,$modifier_actionneur)";

		$sth = $bdd->prepare($sql);
		$sth->execute();
		
	}

	exit();


?>