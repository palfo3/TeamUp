<?php

//Ricerca teammate in candidato vedendo se accettato  == 1
//Imposta accettato = 0

$mail = "";

if(isset($_POST['mail']))
  $mail = $_POST['mail'];

//Ricerca in canidato
require "BackEnd/db_candidato.php";
$candidato = new db_candidato();

if($candidato->RicercaTeammate($mail) == TRUE){
    $candidato->Licenziato($mail);
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