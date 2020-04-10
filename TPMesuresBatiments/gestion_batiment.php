<?php 
  session_start();
?>
<!DOCTYPE HTML>

<html>

  <head>
    <title></title>
    <meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="gestion_batiment.css" />
  </head>
  
  <body>
    <?php
      if (!isset($_SESSION["isConnected"])) {
            echo "<form action=\"connexion.php\" method=\"post\">";
            echo "<span><label>Pseudo</label> : <input type=\"text\" name=\"pseudo\"/></span>";
            echo "<span><label>Mot de passe</label> : <input type=\"text\" name=\"mdp\"/></span>";
            echo "<input type=\"submit\" name=\"submit\" value=\"Se connecter\">"; 
            echo "</form>";
      }
      else{
        echo strtoupper($_SESSION["pseudo"]);
        echo "<form action=\"deconnexion.php\" method=\"post\">";
        echo "<input type=\"submit\" name=\"submit\" value=\"Deconnexion\">"; 
        echo "</form>";
      }
    ?>
  
    
    
    

  </form>


  <div id="fond">
  
    <div id="titre">
      <span>Gestion de mesures d'un batiment</span>
    </div>
  
    <div id="menu">
      <ul id="lemenu">
      <?php  
      $encours = array(" "," "," "," "," ");

      if( !isset($_GET["page"]) ) { 
        $page=0;
      }else{
        $page=$_GET["page"];
      }
      $encours[$page] = "encours";
       
      echo "<li><a href=\"?page=0\" class=\"btn_menu $encours[0]\">Accueil</a></li>\n";
      echo "<li><a href=\"?page=1\" class=\"btn_menu $encours[1]\">Consultation</a></li>\n";
      echo "<li><a href=\"?page=2\" class=\"btn_menu $encours[2]\">Capteurs</a></li> \n";   
      echo "<li><a href=\"?page=3\" class=\"btn_menu $encours[3]\">Actionneurs</a></li> \n";   
      echo "<li><a href=\"?page=4\" class=\"btn_menu $encours[4]\">Mesures</a></li> \n"; 
      ?> 
      </ul>
    </div>
  
    <div id="contenu">
    <?php
      if( file_exists("page_".$page.".inc.php") ){ 
        include("page_".$page.".inc.php");
      }
    ?>
    </div>
  
    <div id="pied">
      <span>Polytech Annecy-Chambéry - Module IGI642- Base de données et Technologies web</span>
    </div>
 
  </div>
  
  </body>
</html>  
  
  
  
