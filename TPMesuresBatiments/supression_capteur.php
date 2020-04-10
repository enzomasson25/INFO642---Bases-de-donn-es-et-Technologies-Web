<?php 
	header('Location: http://localhost/GestionMesuresBatiments/gestion_batiment.php?page=2');

	echo $_POST['nom'];	

	if($_POST['nom'] != ""){
		include("connexion_bdd.php");
		$nom = $_POST['nom']; 

		$sql =  "DELETE FROM capteur
                WHERE nom='$nom'";

        echo "$sql";
		$sth = $bdd->prepare($sql);
		$sth->execute();
	}

	exit();
	

?>