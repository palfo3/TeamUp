<?php

$progetto = "2";  //ultimo progetto cercato, il quale verrà passato alla registrazione candidato

// Uploads files
if(isset($_POST['candidati'])) { // if save button on the form is clicked

    	require "BackEnd/db_candidato.php";
  		$candidato = new db_candidato();

      require "BackEnd/db_progetto.php";
      $progetto = new db_progetto();

	    //Registrazione progetto
	    $array = array("mailUtente" => $_SESSION['mail'],
	            "progettoID" => $progetto, 
	            "accettato" => "0");
	    $candidato->register($array); 
 
}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
    <center>
         <form action="Candidatura.php" method="POST">
            <table border="1" align="center"> <br>

              <input type="file" name="file">
              <input type="submit" name="save" value="Carica file">

            </table>
         </form>
    </center>
</body>
</html>