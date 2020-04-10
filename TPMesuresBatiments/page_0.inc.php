<style>
<?php include 'page_0.inc.css'; ?>
</style>

<?php
  include("connexion_bdd.php");

  echo "<h2>Bienvenue sur votre site de gestion de mesures</h2>\n";
  
  echo "<p>Cette interface vous permettra de:";
  echo "<ul>";
      echo "<li>Consulter les capteurs</li>";
      if (isset($_SESSION['ajout_capteur']) && $_SESSION['ajout_capteur'] == 1) {
        echo("<li>Ajouter des capteurs");     
      }
      if (isset($_SESSION['modifier_capteur']) && $_SESSION['modifier_capteur'] == 1) {
        echo("<li>Modifier des capteurs");     
      }
      
      echo "<li>Consulter les actionneurs</li>";
      if (isset($_SESSION['ajout_actionneur']) && $_SESSION['ajout_actionneur'] == 1) {
        echo("<li>Ajouter des actionneurs");     
      }
      if (isset($_SESSION['modifier_actionneur']) && $_SESSION['modifier_actionneur'] == 1) {
        echo("<li>Modifier des actionneurs");     
      }
  echo "</ul>";
  echo "</p>";
  

  if (isset($_SESSION["admin"]) && $_SESSION["admin"]==1) {
      
      echo "<p>";
      echo "<span>Liste des utilisateurs :</span>";

      $sql =  "SELECT pseudo, admin, ajout_capteur, modifier_capteur, ajout_actionneur, modifier_actionneur
                FROM utilisateur";

      $sth = $bdd->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll();
      echo "<table id=\"utilisateurs\">";
      echo "<th>Pseudo</th>";
      echo "<th>Admin</th>";
      echo "<th>Ajouter capteurs</th>";
      echo "<th>Modifier capteurs</th>";
      echo "<th>Ajouter actionneurs</th>";
      echo "<th>Modifier actionneurs</th>";
      echo "<th>Modifier</th>";
      echo "<th>Supprimer</th>";

      foreach ($result as $user) {
          
          echo "<tr>";
              echo "<form action=\"modifier_droits.php\" method=\"post\">";
              echo "<td>".$user['pseudo']."</td>";
              echo "<input name=\"pseudo\" type=\"hidden\" value=".$user['pseudo'].">";
              echo "<td><input type=\"checkbox\" name=\"admin\"";if($user['admin']){echo "checked";}echo "></td>";
              echo "<td><input type=\"checkbox\" name=\"ajout_capteur\"";if($user['ajout_capteur']){echo "checked";}echo "></td>";
              echo "<td><input type=\"checkbox\" name=\"modifier_capteur\"";if($user['modifier_capteur']){echo "checked";}echo "></td>";
              echo "<td><input type=\"checkbox\" name=\"ajout_actionneur\"";if($user['ajout_actionneur']){echo "checked";}echo "></td>";
              echo "<td><input type=\"checkbox\" name=\"modifier_actionneur\"";if($user['modifier_actionneur']){echo "checked";}echo "></td>";
              echo "<td><input type=\"submit\" name=\"submit\" value=Modifier ></td>";
              echo "</form>";

              echo "<form action=\"supprimer_utilisateur.php\" method=\"post\">";
                echo "<input name=\"pseudo\" type=\"hidden\" value=".$user['pseudo'].">";
                echo "<td><input type=\"submit\" name=\"submit\" value=Supprimer ></td>";

              echo "</form>";
          echo "</tr>";
         
      }
      echo "</table>";
      echo "</p>";


      echo("<p>");
      echo "Ajout d'utilisateur :";

      echo "<form id=\"ajout_utilisateur\" action=\"creation_utilisateur.php\" method=\"post\">";
        echo "<p><label>Pseudo</label> : <input type=\"text\" name=\"pseudo\" required/></p>";
        echo "<p><label>Mot de passe</label> : <input type=\"text\" name=\"mdp\" required/></p>";
        echo "<p><label>Admin</label> : <input type=\"checkbox\" name=\"admin\" /></p>";
        echo "<p><label>Ajouter un capteur</label> : <input type=\"checkbox\" name=\"ajout_capteur\" /></p>";
        echo "<p><label>Modifier un capteur</label> : <input type=\"checkbox\" name=\"modifier_capteur\" /></p>";
        echo "<p><label>Ajouter un actionneur</label> : <input type=\"checkbox\" name=\"ajout_actionneur\" /></p>";
        echo "<p><label>Modifier un actionneur</label> : <input type=\"checkbox\" name=\"modifier_actionneur\" /></p>";
        echo "<input type=\"submit\" name=\"submit\" value=Créer>";
      echo "</form>";

      echo "</p>";
  }

?>
