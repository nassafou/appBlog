<?php
// On se connecte à notre base de données

 try{
    $bdd = new PDO('mysql:host=localhost; dbname=db_tchat', 'root', '');
 }
 catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
 }
 
 if(isset($_POST['submit'])){// si on a envoyé des données avec le formulaire
    
    if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){ // si les variables ne sont pas vides
        
        $pseudo = $_POST['pseudo'];
        $message = $_POST['message']; // on sécurise nos données 
        
        $insertion = $bdd->prepare('INSERT INTO messages VALUES("", :pseudo, :message)');
        $insertion->execute(array(
                                  'pseudo'  => $pseudo,
                                  'message' => $message ));
    }
    else{
        echo "Vous avez oublié de remplir un des champs !";
    }
    
 }


?>