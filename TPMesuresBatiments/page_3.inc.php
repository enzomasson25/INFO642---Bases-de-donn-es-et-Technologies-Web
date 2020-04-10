<style>
<?php include 'page_3.inc.css'; ?>
</style>

<?php
    include("connexion_bdd.php");
    
    $sql =  "SELECT nom, type_actionneur, description, etat
        FROM actionneur";

    $sth = $bdd->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();
  
    if (isset($_SESSION["modifier_actionneur"]) && $_SESSION["modifier_actionneur"] == 1) {
        echo "<table id=\"modif\">";
        echo "<tr>";
            echo "<th>Nom</th>";
            echo "<th>Type actionneur</th>";
            echo "<th>Description</th>";
            echo "<th>Etat</th>";
            echo "<th>Modifier</th>";
        echo "</tr>";
        foreach ($result as $actionneur) {
            echo "<tr>";
                echo "<td>".$actionneur['nom']."</td>";
                echo "<form action=\"modifier_actionneur.php\" method=\"post\">";
                     echo "<input name=\"nom\" type=\"hidden\" value=".$actionneur['nom'].">";
                    echo "<td><input class=donnee type=\"text\" name=\"type\" value=".$actionneur['type_actionneur']." required></td>";
                    echo "<td><input class=donnee type=\"text\" name=\"description\" value=".$actionneur['description']." required></td>";
                    echo "<td>";
                    echo "<select name=\"etat\">";

                        if($actionneur['etat']=="ON"){
                            echo "<option selected>ON</option>";
                             echo"<option>OFF</option>";
                        }
                        else{
                            echo"<option>ON</option>";
                            echo "<option selected>OFF</option>";
                        }
                        

                    echo "</select>";
                    echo "</td>";
                    echo "<td><input type=\"submit\" name=\"submit\" value=Modifier></td>";
                echo "</form>";
            echo "</tr>";
        }


        echo "</table>";
    }
    else{
        echo "<table id=\"actionneurs\">";
        echo "<tr>";
            echo "<th>Nom</th>";
            echo "<th>Type actionneur</th>";
            echo "<th>Description</th>";
            echo "<th>Etat</th>";

        echo "</tr>";
        foreach ($result as $actionneur) {
            echo "<tr>";
                    echo "<td>".$actionneur['nom']."</td>";
                    echo "<td>".$actionneur['type_actionneur']."</td>";
                    echo "<td>".$actionneur['description']."</td>";
                    echo "<td>".$actionneur['etat']."</td>";
                    
            echo "</tr>";
        }


        echo "</table>";
    }
	
    $sql =  "SELECT zone.nom
                FROM zone";

    $sth = $bdd->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();

    if (isset($_SESSION['ajout_actionneur']) && $_SESSION['ajout_actionneur']==1)  {

        echo "<p>";
         echo "<span>Ajouter un actionneur : </span>";
         echo "<form id=insertion action=\"insertion_actionneur.php\" method=\"post\">";
            echo "<p><label>Nom actionneur</label> : <input type=\"text\" name=\"nom\" required/></p>";
            echo "<p><label>Type actionneur</label> : <input type=\"text\" name=\"type\" required/></p>";
            echo "<label>Zone géographique</label> : <select name=\"zone\">";

            foreach ($result as $row) {
                echo "<option>".$row['nom'];
            }
            echo "</select>";

            echo "<p><label>Description</label> : <input type=\"text\" name=\"description\" required/></p>";

            echo "<label>Etat</label> : <select name=\"etat\">";
            echo "<option>ON";
            echo "<option>OFF";

            echo "</select>";

            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<input type=\"submit\" name=\"submit\" value=\"Envoyer\">";

            

        echo "</form>";
        echo "</p>";
    }
    else{

        
    }


   

?>
