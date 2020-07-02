<?php

$_SESSION['mail'] = "alfonso@mail.it";

//Ricerca in canidato
require "BackEnd/db_candidato.php";
$candidato = new db_candidato();

if($candidato->RicercaTeammate($mail) == TRUE){
    $candidato->EliminaTeammate($mail);
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
           <form  ACTION="AbbandonoProgetto.php" METHOD = "POST">
             <table border="1" align="center"> <br>
             	
              <input  type="submit" align="right" value="Abbandona"> <br><br>
        
        	</table>
           </form>
       </center>
</body>
</html>
</html>