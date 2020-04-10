<?php 
	header('Location: http://localhost/GestionMesuresBatiments/gestion_batiment.php');

	include("connexion_bdd.php");

	$pseudo = $_POST['pseudo'];

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

	echo "$pseudo";
	echo "$ajout_capteur";
	echo "$modifier_capteur";
	echo "$ajout_actionneur ";
	echo "$modifier_actionneur";
	echo "$admin";


	$sql =  "UPDATE utilisateur
              SET admin = $admin,
              ajout_capteur = $ajout_capteur,
              modifier_capteur = $modifier_capteur,
              ajout_actionneur = $ajout_actionneur,
              modifier_actionneur = $modifier_actionneur
              WHERE pseudo = '$pseudo'";

    echo $sql;
	$sth = $bdd->prepare($sql);
	$sth->execute();

	exit();

?>