<?php

$_SESSION['mail'] = "emanuelesala15@gmail.com";

$nome = "";
$descrizione = "";
$data_scadenza = "";
$data_creazione = "";
$creazione_date = "";
$scadenza_date = "";
$tag = "";


if(isset($_POST['nome'])){
    $nome = $_POST['nome']; 
}

if(isset($_POST['descrizione'])){
    $descrizione = $_POST['descrizione'];
}

if(isset($_POST['data_scadenza'])){
    $data_scadenza = $_POST['data_scadenza'];
}

if(isset($_POST['data_creazione'])){
   	$data_creazione = $_POST['data_creazione'];
}

if(isset($_POST['tag'])){
    $tag = $_POST['tag'];
}


//Strtotime converte la data passata come parametro in secondi. Quest'ultimi vengono assegnati ad un'altra variabile.
$creazione_date = strtotime($data_creazione);
$scadenza_date = strtotime($data_scadenza); 


//Se i secondi di creazione_date sono maggiori dei secondi di scadenza_date allora re-inserire la data.
//creazione_date e scadenza_date possono essere uguali.
if($creazione_date > $scadenza_date){ 
  echo "ATTENZIONE! DATA CREAZIONE MAGGIORE DI DATA SCADENZA!!";   
}else{ 
  require "BackEnd/db_progetto.php";
  $interface = new db_progetto();
  if($nome != "" && $descrizione != "" && $data_scadenza != "" && $data_creazione != ""){
    $array = array("leader" => $_SESSION['mail'],
            "nome" => $nome,
            "descrizione" => $descrizione,
            "data_scadenza" => $data_scadenza,
            "data_creazione" => $data_creazione);
    $interface->register($array);   
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
           <form  ACTION="InserimentoProgetto.php" METHOD = POST>
             <table border="1" align="center"> <br>
             	
              <input type="text" id="nome" name="nome" size="30" placeholder="Nome"> <br><br>

              <input type="text" id="descrizione" name="descrizione" size="30" placeholder="Descrizione"><br> <br>
         		  data creazione del progetto
              
              <input type="date" id="date" name="data_creazione" min="" placeholder="Data scadenza"> <br><br>
              data scadenza del progetto
              
              <input type="date" id="date" name="data_scadenza" placeholder="Data creazione"> <br><br>

              <input type="text" id="tag" name="tag" placeholder="Tag"> <br><br>

              <input  type="submit" align="right" id="login_btn" value="Inserisci"> <br><br>
        	
        	</table>
           </form>
       </center>
</body>
</html>