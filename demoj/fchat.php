<html>
    <head>
        <meta charset="utf-8"/>
        <title>Le tchat en AJAX</title>
    </head>
    <body>
        <h1>Un formulare AJAX</h1>
        <div id="messages">
            <!-- Messages du tchat --->
            <?php       
 try{
    $bdd = new PDO('mysql:host=localhost; dbname=db_tchat', 'root', '');
 }
 catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
 }
 
  // on recupère les 10 derniers messages postés
 $requete = $bdd->query('SELECT * FROM messages ORDER BY id DESC LIMIT 0,10');
 
 while($donnees = $requete->fetch()){
   // on affiche le message (l'id servira plus tard )
   echo "<p id=\"" . $donnees['id'] . "\">"
   . $donnees['auteur'] . "dit : " . $donnees['message'] . "</p>";
 }
  $requete->closeCursor();
 ?>
        </div>
        <!---Formulaire HTML super simple à sérialiser -->
    <form  method="POST" action="traitement.php">
        <p>
        Pseudo :<input type="text"  id="pseudo" name="pseudo" /><br />
        Message : <textarea name="message"  id="message"  /></textarea> <br />
	    <input type="submit" name="submit" id="envoi" value="Envoyez votre message !"  />
        </p>
    </form>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
         <script src="js/main.js"></script>
    </body>
</html>