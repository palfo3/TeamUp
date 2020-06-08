<?php

$mail = $_POST['mail'];
$nome = $_POST['nome']; 
$descrizione = $_POST['descrizione'];
$data_scadenza = $_POST['data_scadenza'];
$data_creazione = $_POST['data_creazione'];

if(isset($_POST['mail']) && isset($_POST['nome']) && isset($_POST['descrizione']) 
	&& isset($_POST['data_scadenza']) && isset($_POST['data_creazione'])){

	echo "ciao";
}

require "BackEnd/db_progetto.php";

$interface = new db_progetto();
    
$array = array("leader" => $mail,
	    "nome" => $nome,
	    "descrizione" => $descrizione,
	    "data_scadenza" => $data_scadenza,
	    "data_creazione" => $data_creazione);

$interface = new db_progetto();
$interface->register($array);         

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	   <center>
           <form  ACTION="InserimentoProgetto.php" METHOD = POST>
             <table border="1" align="center"> <br>

             	<input type="text" id="mail" name="mail" placeholder="Mail"> <br><br>

             	<input type="text" id="nome" name="nome" size="30" placeholder="Nome"> <br><br>

                <input type="text" id="descrizione" name="descrizione" size="30" placeholder="Descrizione"> <br> <br>
           
                <input type="date" id="date" name="date" placeholder="Data scadenza"> <br><br>

                <input type="date" id="date" name="date" placeholder="Data creazione"> <br><br>
   
                <input  type="submit" align="right" id="login_btn" value="Inserisci"> <br><br>
        	
        	</table>
           </form>
       </center>
</body>
</html>