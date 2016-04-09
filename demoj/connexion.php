<?php

/*
 *Nous créons deux variables : $username et $password
 *
 */
  $username = "sdz";
  $password = "salut";
if(isset($_POST['username']) && isset($_POST['password'])){                        
    if($_POST['username'] == $username && $_POST['password'] == $password){// si les infos correspondent..
        session_start();
        $_SESSION['user'] = $username;
        echo "Success";
    }
    else{// sinon
        echo "Failed";
        
    }
    
}


?>