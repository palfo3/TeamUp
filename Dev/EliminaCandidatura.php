<?php

///Prendere l'utente tra i candidati, associato ad un progetto poichè può avere più istanze

$mail = "";

if(isset($_POST['mail']))
  $mail = $_POST['mail'];

require "BackEnd/db_candidato.php";
$candidato = new db_candidato();

if($candidato->EliminaCandidatura($mail)){
  header("location: ../FrontEnd/Homepage.html");
}else{
  echo "non esiste";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	   <center>
           <form  ACTION="EliminaCandidatura.php" METHOD = "POST">
             <table border="1" align="center"> <br>
             	
              <input type="text" id="mail" name="mail" size="30" placeholder="Email Candidato"> <br><br>

              <input  type="submit" align="right" value="Elimina"> <br><br>
        
        	</table>
           </form>
       </center>
</body>
</html>