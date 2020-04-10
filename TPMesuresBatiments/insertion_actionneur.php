<?php
	header('Location: http://localhost/GestionMesuresBatiments/gestion_batiment.php?page=1');

	include("connexion_bdd.php");

	if(isset($_POST['nom']) && isset($_POST['type']) && isset($_POST['zone']) && isset($_POST['description']) && isset($_POST['etat'])){
		$nom = $_POST['nom'];
		$type = $_POST['type'];
		$zone = $_POST['zone'];
		$description = $_POST['description'];
		$etat = $_POST['etat'];

		$sql =  "INSERT INTO actionneur (nom,type_actionneur,description,etat)
                VALUES ('$nom','$type','$description','$etat')";

    	$sth = $bdd->prepare($sql);
    	$sth->execute();


    	$sql =  "SELECT id_actionneur
    			FROM actionneur
    			WHERE nom = '".$nom."'";

    	$sth = $bdd->prepare($sql);
    	$sth->execute();
    	$result = $sth->fetchAll();
		$id_actionneur = $result[0][0];
		


		$sql =  "SELECT id_zone
    			FROM zone
    			WHERE nom = '".strtoupper($zone)."'";


    	$sth = $bdd->prepare($sql);
    	$sth->execute();
    	$result = $sth->fetchAll();
		$id_zone = $result[0][0];
		


		$sql =  "INSERT INTO actionneur2zone (id_actionneur,id_zone)
                VALUES ('$id_actionneur','$id_zone')";

    	$sth = $bdd->prepare($sql);
    	$sth->execute();

    	exit();
	}

?>