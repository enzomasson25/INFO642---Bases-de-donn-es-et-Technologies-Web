<?php 
	header('Location: http://localhost/GestionMesuresBatiments/gestion_batiment.php?page=1');
	
	if ($_POST['nom']!="" && $_POST['type']!="" && $_POST['unite']!="" && $_POST['val_min']!="" && $_POST['val_max']!="") {

		include("connexion_bdd.php");

		$nom = $_POST['nom'];
		$type = $_POST['type'];
		$unite = $_POST['unite'];
		$val_min = $_POST['val_min'];
		$val_max = $_POST['val_max'];
		$zone = $_POST['zone'];

		$sql =  "SELECT id_zone
				FROM zone
				WHERE nom = '$zone'";

		$sth = $bdd->prepare($sql);
		$sth->execute();
		$result=$sth->fetchAll();
		$id_zone = $result[0][0];

		$sql =  "INSERT INTO capteur(nom,id_zone,type_capteur,unite,valmin,valmax)
                VALUES ('$nom',$id_zone,'$type','$unite',$val_min,$val_max)";

        echo "$sql";
		$sth = $bdd->prepare($sql);
		$sth->execute();
	}

	exit();
?>