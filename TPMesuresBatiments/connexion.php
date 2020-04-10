<?php 
	session_start();
	header('Location: http://localhost/GestionMesuresBatiments/gestion_batiment.php');
    include("connexion_bdd.php");

    if (isset($_POST['pseudo']) && isset($_POST['mdp']) && $_POST['pseudo']!="" && $_POST['mdp']!="") {
    	$pseudo = $_POST['pseudo'];
    	$mdp = $_POST['mdp'];


    	$sql =  "SELECT mdp, admin, ajout_capteur, modifier_capteur, ajout_actionneur, modifier_actionneur
                FROM utilisateur
                WHERE pseudo = '$pseudo'";

	    $sth = $bdd->prepare($sql);
	    $sth->execute();
	    $result = $sth->fetchAll();
	    if($mdp == $result[0][0]){
	    	echo "connected";
	    	$_SESSION["isConnected"] = 1;
	    	$_SESSION["pseudo"]=$pseudo;
	    	$_SESSION["admin"]=$result[0][1];
	    	$_SESSION["ajout_capteur"]=$result[0][2];
	    	$_SESSION["modifier_capteur"]=$result[0][3];
	    	$_SESSION["ajout_actionneur"]=$result[0][4];
	    	$_SESSION["modifier_actionneur"]=$result[0][5];
	    }
    }

    exit();
?>