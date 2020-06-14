<?php

/*$email = "";
$Name = "";
$GivenName = "";
$FamilyName  = "";

if(isset($_POST['email'])){
    $email = $_POST['email']; 
}



require "BackEnd/db_utente.php";
$utente = new db_utente(); 

//Se l'email esiste nel datavase allora non la fase di registrazione non viene effettuata
if($utente->checkUtente($email) == TRUE){       
    $array = array("mail" => $email,
    "nome" => $Name,
    "cognome" => $FamilyName,
    "password" => "NULL",
    "descrizione" => "");
    $utente->register($array);           
}*/

$email = "";

if(!isset($_POST['email'])) {
    $email = $_POST['email'];
    echo $email;
    echo "ok";
}else{
  echo 'no variable received';
}

?>

<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="953839603005-j6b0j5flahopjnb72n39chicm0r17dqg">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
  <form  ACTION="google.php" onsubmit = "return onSignIn()" METHOD = POST>

    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

    <input type = "hidden" id = "ID" name="ID">
    <input type = "hidden" id = "Name" name="Name">
    <input type = "hidden" id = "GivenName" name="GivenName">
    <input type = "hidden" id = "FamilyName" name="FamilyName">
    <input type = "hidden" id = "ImageUrl" name="ImageUrl">
    <input type = "hidden" id = "Email" name="Email">

    <!--Per prima cosa incorporiamo le librerie JQuery che ci serviranno per inviare i dati via Ajax !-->

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js">
      function onSignIn(googleUser){

        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); 
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);

       /* document.getelementbyId('ID').value = profile.getId();
        document.getelementbyId('Name').value = profile.getName();
        document.getelementbyId('GivenName').value = profile.getGivenName();
        document.getelementbyId('FamilyName').value = profile.getFamilyName();
        document.getelementbyId('ImageUrl').value = profile.getImageUrl();
        document.getelementbyId('Email').value = profile.getEmail();*/

        //AJAX 

        document.getelementbyId('Email').value = profile.getEmail();
        var email = document.getelementbyId('Email').value;
        $.ajax({
          type: "POST",
          url: 'google.php',
          data: {'Email': email},
          
          error: function(result) {
            alert("Impossibile salvare!\nContatta il webmaster");
          }
      });


    </script>
  </form>
  </body>
</html>