<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    
      try {
          $bdd = new PDO('mysql:host=localhost; dbname=bdd', $username, $password);
      }
      catch(exception $e) {
          echo($e->getMessage());
          die('Erreur '.$e->getMessage());
      }
?>