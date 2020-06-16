<?php
require 'db_progetto.php';

$nome_p = "";

if(isset($_POST['progetto']))
    $nome_p = $_POST['progetto'];

$progetto = new progetto($_POST);
$db_progetto = new db_progetto();
$db_progetto->Ricerca_Progetto($nome_p);

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

              <input  type="submit" align="right" id="login_btn" value="Ricerca"> <br><br>

           </form>
       </center>
</body>
</html>