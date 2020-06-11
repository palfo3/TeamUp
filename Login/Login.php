<?php

session_start();

if(isset($_POST['mail'])){
    $mail = $_POST['mail'];
}

if(isset($_POST['password'])){
    $password = $_POST['password']; 
}

require "../BackEnd/db_utente.php";
$utente = new db_utente(); 

if($utente->access_User($mail, $password) == TRUE){
	header("location: Profilo.html");
}else{
    echo '<script type="text/javascript">
    alert("Email o password non corretti. Premi OK per re-inserirli");
    window.location= "Login.html";
    </script>';
}   

?>