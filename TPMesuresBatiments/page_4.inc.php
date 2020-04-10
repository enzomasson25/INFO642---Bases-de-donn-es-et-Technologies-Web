<style>
<?php include 'page_4.inc.css'; ?>
</style>


<?php 

include("connexion_bdd.php");

$sql =  "SELECT *
		 FROM capteur";

$sth = $bdd->prepare($sql);
$sth->execute();
$result=$sth->fetchAll();

#var_dump($result);
echo "<form action=\"http://localhost/GestionMesuresBatiments/gestion_batiment.php?page=4\" method=\"post\">";
echo "<span><label>Selectionner un capteur :</label>";
echo "<select name=\"nom\">";
foreach ($result as $capteur) {
	echo "<option>".$capteur['nom'];
}
echo "</select>";

echo "<input type=\"submit\" name=\"submit\" value=\"OK\">";
echo "</span>";
echo "</form>";

if(isset($_POST['nom'])){
	if ($_POST['nom']!="") {

		include("connexion_bdd.php");

		$nom = $_POST['nom'];

		$sql =  "SELECT id_capteur
				FROM capteur
				WHERE nom = '$nom'";

		$sth = $bdd->prepare($sql);
		$sth->execute();
		$result=$sth->fetchAll();
		$id_capteur = $result[0][0];

		$sql =  "SELECT *
				FROM mesure
				WHERE id_capteur = '$id_capteur'";

		$sth = $bdd->prepare($sql);
		$sth->execute();
		$liste_mesures=$sth->fetchAll();
	}
}

if (isset($liste_mesures)) {
	if (count($liste_mesures) != 0) {
	$liste_valeur=array();
	foreach ($liste_mesures as $mesure) {
		array_push($liste_valeur, $mesure['valeur']);
	}

	$nb = calcul_nb_valeur($liste_valeur);

	$val_rouge = array();
	sort($liste_valeur);
	for ($i=0; $i <$nb ; $i++) { 
		array_push($val_rouge, $liste_valeur[$i]);
	}
	rsort($liste_valeur);
	for ($i=0; $i <$nb ; $i++) { 
		array_push($val_rouge, $liste_valeur[$i]);
	}



	echo "<p>Mesures pour le capteur ".$_POST['nom'].' : </p>';
	echo "<table>";
	echo "<th>Id mesure</th>";
	echo "<th>Id capteur</th>";
	echo "<th>Instant</th>";
	echo "<th>Valeur</th>";

		foreach ($liste_mesures as $mesure) {
			echo "<tr>";
			echo "<td>".$mesure['id_mesure']."</td>";
			echo "<td>".$mesure['id_capteur']."</td>";
			echo "<td>".$mesure['instant']."</td>";
			if(in_array($mesure['valeur'], $val_rouge)){
				echo "<td class=\"red\">".$mesure['valeur']."</td>";
			}
			else{
				echo "<td>".$mesure['valeur']."</td>";
			}
			echo "</tr>";
		}

	echo "</table>";
	}
	else{
		echo "<p> Pas de mesures pour le capteur ".$_POST['nom']." :( </p>";
	}
}


function calcul_nb_valeur($liste_valeur)
{
    $nb = round(count($liste_valeur)/(10));
    return $nb;
}


?>