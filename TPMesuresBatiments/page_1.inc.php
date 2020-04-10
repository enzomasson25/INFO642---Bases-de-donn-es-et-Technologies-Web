<style>
<?php include 'page_1.inc.css'; ?>
</style>

<?php
    include("connexion_bdd.php");
    
    echo "<br>";

    if (isset($_GET['salle'])) {


    	$sql =  "SELECT zone.id_zone, capteur.nom
    			FROM zone 
    			JOIN capteur on capteur.id_zone = zone.id_zone
    			where zone.nom ='".strtoupper ($_GET['salle'])."'";

    	$sth = $bdd->prepare($sql);
    	$sth->execute();
    	$result = $sth->fetchAll();

    	echo "<span>Les capteurs :</span>";
    	echo "<ul>";
		foreach  ($result as $row) {
			echo "<li>";
		    print  $row[1] . "\t";
		    echo "</li>";
		}
		echo "</ul>";


		$sql =  "SELECT zone.id_zone, actionneur.nom
    			FROM zone 
    			JOIN actionneur2zone on actionneur2zone.id_zone = zone.id_zone
                JOIN actionneur on actionneur.id_actionneur = actionneur2zone.id_actionneur
    			where zone.nom ='".strtoupper ($_GET['salle'])."'";

    	$sth = $bdd->prepare($sql);
    	$sth->execute();
    	$result = $sth->fetchAll();

    	echo "<span>Les actionneurs :</span>";
    	echo "<ul>";
		foreach  ($result as $row) {
			echo "<li>";
		    print  $row[1] . "\t";
		    echo "</li>";
		}
		echo "</ul>";


	}
?>

<ul id="etage2">
<li id="c206"><a href="?page=1&salle=C206"><span>c206</span></a></li>   
<li id="c207"><a href="?page=1&salle=C207"><span>c207</span></a></li>   
<li id="c208"><a href="?page=1&salle=C208"><span>c208</span></a></li>   
<li id="c209"><a href="?page=1&salle=C209"><span>c209</span></a></li>   
<li id="c210"><a href="?page=1&salle=C210"><span>c210</span></a></li>   
<li id="c213"><a href="?page=1&salle=C213"><span>c213</span></a></li>   
<li id="c214"><a href="?page=1&salle=C214"><span>c214</span></a></li>   
<li id="c215"><a href="?page=1&salle=C215"><span>c215</span></a></li>   
</ul>
