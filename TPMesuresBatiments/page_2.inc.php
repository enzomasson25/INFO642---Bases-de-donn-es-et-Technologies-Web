<style>
<?php include 'page_2.inc.css'; ?>
</style>


<?php 

	include("connexion_bdd.php");
	
	$sql =  "SELECT nom, type_capteur, unite, valmin, valmax
    		FROM capteur";

	$sth = $bdd->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();


	if (isset($_SESSION["modifier_capteur"]) && $_SESSION["modifier_capteur"] == 1) {
		echo "<table>";
		echo "<tr>";
			echo "<th>Nom</th>";
			echo "<th>Type Capteur</th>";
			echo "<th>Unite</th>";
			echo "<th>Val Min</th>";
			echo "<th>Val Max</th>";
			echo "<th>Modifier</th>";
			echo "<th>Supprimer</th>";
		echo "</tr>";

		foreach ($result as $row) {
			
			echo "<tr>";
			echo "<form  action=\"modifier_capteur.php\" method=\"post\">";
			echo "<td>$row[0] </td>";
			echo "<input name=\"nom\" type=\"hidden\" value=$row[0]>";
			for ($i = 1; $i <= 4; $i++) {

			    echo "<td><input class=donnee type=\"text\" name=\"$i\" value=$row[$i] ></td>";
			}
			echo "<td><input type=\"submit\" name=\"submit\" value=Modifier ></td>";
			echo "</form>";

			echo "<form action=\"supression_capteur.php\" method=\"post\">";
				echo "<input name=\"nom\" type=\"hidden\" value=$row[0]>";
				echo "<td><input type=\"submit\" name=\"submit\" value=Supprimer ></td>";
			echo "</form>";
			echo "</tr>";
			
	            
	    }

		echo "</table>";
	}
	else{
		echo "<table>";
		echo "<tr>";
			echo "<th>Nom</th>";
			echo "<th>Type Capteur</th>";
			echo "<th>Unite</th>";
			echo "<th>Val Min</th>";
			echo "<th>Val Max</th>";
		echo "</tr>";

		foreach ($result as $row) {
			echo "<tr>";
			echo "<td>$row[0] </td>";
			for ($i = 1; $i <= 4; $i++) {

			    echo "<td class=donnee>$row[$i]</td>";
			}
			echo "</tr>";    
	    }
		echo "</table>";
	}


	if (isset($_SESSION['ajout_capteur']) && $_SESSION['ajout_capteur']==1) {
		
		$sql =  "SELECT nom
    		FROM zone";

		$sth = $bdd->prepare($sql);
		$sth->execute();
		$zones = $sth->fetchAll();

		echo "<p>";
			echo "<span>Ajout d'un capteur : </span>";

			echo "<form id=\"ajout_capteur\" action=\"ajout_capteur.php\" method=\"post\">";
			echo "<p><label>Nom</label> : <input type=\"text\" name=\"nom\" required/></p>";
			echo "<label>Zone géographique</label> : <select name=\"zone\">";

            foreach ($zones as $zone) {
                echo "<option>".$zone['nom'];
            }
            echo "</select>";
			echo "<p><label>Type</label> : <input type=\"text\" name=\"type\" required/></p>";
			echo "<p><label>Unite</label> : <input type=\"text\" name=\"unite\" required/></p>";
			echo "<p><label>Valeur min</label> : <input type=\"text\" name=\"val_min\" required/></p>";
			echo "<p><label>Valeur max</label> : <input type=\"text\" name=\"val_max\" required/></p>";
			echo "<input type=\"submit\" name=\"submit\" value=Créer>";
			echo "</form>";

		echo "</p>";
	}

	

?>