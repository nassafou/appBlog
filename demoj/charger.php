<?php
// On se connecte à notre base de données

 try{
    $bdd = new PDO('mysql:host=localhost; dbname=db_tchat', 'root', '');
 }
 catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
 }
 
 if(isset($_GET['id'])){// On vérifie si l'id est bien présent et pas vide
    
    $id = (int) $_GET['id']; //On s'assure que c'est un nombre entier
    
    // on recupère les messages ayant un id plus grand que celui donné
    
 $requete = $bdd->query('SELECT * FROM messages WHERE id > :id ORDER BY id DESC');
 $requete->execute(array("id" => $id));
 $messages = null;
 
 // on inscrit tous les nouveaux messages dans une variable
 while($donnees = $requete->fetch()){
   // on affiche le message (l'id servira plus tard )
   echo "<p id=\"" . $donnees['id'] . "\">"
   . $donnees['auteur'] . "dit : " . $donnees['message'] . "</p>";
 }
  echo $messages; // enfin , on retourne les messages à notre script JS
 }

?>