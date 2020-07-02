<?php

$nome_p = "";

if(isset($_POST['progetto']))
    $nome_p = $_POST['progetto'];

if($nome_p != ""){

  require '../BackEnd/db_progetto.php';
  $db_progetto = new db_progetto();

  if($db_progetto->Ricerca_Progetto($nome_p) == TRUE){
    header("location: VuoiCandidarti.php");
  }else{
    header("location: RicercaProgetto.php");
  } 
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	   <center>
           <form  ACTION="RicercaProgetto.php" METHOD = "POST">
             <table border="1" align="center"> <br>
             	
              <input type="text" id="progetto" name="progetto" size="30" placeholder="Inserisci progetto"> <br><br>

              <input  type="submit" align="right" id="ricerca" value="Ricerca"> <br><br>
            </form>
       </center>
</body>
</html>