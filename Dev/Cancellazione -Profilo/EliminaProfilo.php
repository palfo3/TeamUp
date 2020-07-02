<?php

$_SESSION['mail'] = "daniele@mail.it";
$password = "";

if(isset($_POST['password'])){
	$password = $_POST['password'];
}

require "../BackEnd/db_utente.php";
$utente = new db_utente();

$utente->deleteAccount($_SESSION['mail'], $password);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	   <center>
           <form  ACTION="EliminaProfilo.php" METHOD = "POST">
             <table border="1" align="center"> <br>
             	
              <input type="text" name="password" size="30" placeholder="Password"> <br><br>

              <input  type="submit" align="right" value="Elimina"> <br><br>
        
        	</table>
           </form>
       </center>
</body>
</html>