<?php

$_SESSION['mail'] = "daniele@mail.it";

//Ricerca in canidato
require "BackEnd/db_candidato.php";
$candidato = new db_candidato();

if($candidato->RicercaTeammate($_SESSION['mail']) == TRUE){
    $candidato->EliminaTeammate($_SESSION['mail']);
}else{
  echo "non trovato";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	   <center>
           <form  ACTION="EspulsioneTeammate.php" METHOD = "POST">
             <table border="1" align="center"> <br>
             	
              <input type="text" id="mail" name="mail" size="30" placeholder="Email Teammate"> <br><br>

              <input  type="submit" align="right" value="Cerca"> <br><br>
        
        	</table>
           </form>
       </center>
</body>
</html>