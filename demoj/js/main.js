
$('#envoi').click(function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
var pseudo = encodeURIComponent( $('#pseudo').val() ); // on sécurise les données
var message = encodeURIComponent( $('#message').val() );

if (pseudo != "" && message != "") { // on vérifie si les variables ne sont pas vides
    
    $.ajax({
        url : "traitement.php", // on  donne l'URL du fichier de traitement
        type : "POST", // La requete est type POST
        data : "pseudo=" + pseudo + "&message=" + message // et on envoir nos données 
        });
    $('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); // on ajoute le message dans la zone prévue
}

});
 function charger() {
    
    setTimeout( function(){
        // on lance une requete AJAX
        
        var premierID = $('#messages p:first').attr('id'); // on récupère l'id le plus récent
        
        $.ajax({
            url : "charger.php?id=" + premierID, // on passe l'id le plus récent au fichier de chargement
            type : GET,
            success : function(html){
                $('#messages').prepend(html); // on veut ajouter les noyveaux messages au début du bloc #messages
            }
            });
        charger(); // on lance la fonction
        
        }, 5000); // on execute le chargement toutes les 5 secondes
 }
 
 charger();