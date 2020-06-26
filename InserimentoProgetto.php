<?php

$_SESSION['mail'] = "emanuele@mail.it";

$id = "";
$nome = "";
$descrizione = "";
$data_scadenza = "";
$data_creazione = "";
$creazione_date = "";
$scadenza_date = "";


if(isset($_POST["tag1"]) && isset($_POST["tag2"]) && isset($_POST["tag3"]))
  $tag = array("tag1" => $_POST["tag1"], "tag2" => $_POST["tag2"], "tag3" => $_POST["tag3"]);


if(isset($_POST['nome']))
    $nome = $_POST['nome'];


if(isset($_POST['descrizione']))
    $descrizione = $_POST['descrizione'];

if(isset($_POST['data_scadenza']))
    $data_scadenza = $_POST['data_scadenza'];

if(isset($_POST['data_creazione']))
   	$data_creazione = $_POST['data_creazione'];

//time() mi restitusce i secondi a partire dal 1 gennaio 1970
$var = date("d/m/y");

//Strtotime converte la data passata come parametro in secondi. Quest'ultimi vengono assegnati ad un'altra variabile.
$scadenza_date = strtotime($data_scadenza); 

//Se i secondi di creazione_date sono maggiori dei secondi di scadenza_date allora re-inserire la data.
//creazione_date e scadenza_date possono essere uguali.
if($var < $scadenza_date){ 
  echo "ATTENZIONE! DATA CREAZIONE MAGGIORE DI DATA SCADENZA!!";   
}else{

  require "BackEnd/db_progetto.php";
  $progetto = new db_progetto();

  if($nome != "" && $descrizione != "" && $data_scadenza != ""){
    //Registrazione progetto
    $array = array("leader" => $_SESSION['mail'],
            "nome" => $nome,
            "descrizione" => $descrizione,
            "data_scadenza" => $data_scadenza,
            "data_creazione" => $data_creazione);
    $progetto->register($array); 
  }
}
  require "BackEnd/db_tag.php";
  $db_tag = new db_tag();

  //Registrazione tag
  if($_POST["tag1"] != "")

  $db_tag->register($_POST["tag1"]);

  if($_POST["tag2"] != "")

  $db_tag->register($_POST["tag2"]);

  if($_POST["tag3"] != "")
  $db_tag->register($_POST["tag3"]);


  require "BackEnd/db_associaTag.php";
  $associaTag = new db_associaTag();  

    $array = array("progetto" => $progetto->search_id($_SESSION['mail'], $data_creazione),
             "tag" => $_POST["tag1"],
             "posizione" => "0");

    $associaTag->register($array);

    $array = array("progetto" =>$progetto->search_id($_SESSION['mail'], $data_creazione),
             "tag" => $_POST["tag2"],
             "posizione" => "1");
    $associaTag->register($array); 

    $array = array("progetto" => $progetto->search_id($_SESSION['mail'], $data_creazione),
             "tag" => $_POST["tag3"],
             "posizione" => "2");
    $associaTag->register($array); 
  
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	   <center>
           <form  ACTION="InserimentoProgetto.php" onsubmit = "return Prova()" METHOD = "POST">
             <table border="1" align="center"> <br>
             	
              <input type="text" id="nome" name="nome" size="30" placeholder="Nome"> <br><br>

              <input type="text" id="descrizione" name="descrizione" size="30" placeholder="Descrizione"><br> <br>
    
              data scadenza del progetto          
              <input type="date" id="date" name="data_scadenza" placeholder="Data creazione"> <br><br>

              <input type="text" id="tag1" name="tag1" placeholder="Tag1"> <br><br>
              <input type="text" id="tag2" name="tag2" placeholder="Tag2"> <br><br>
              <input type="text" id="tag3" name="tag3" placeholder="Tag3"> <br><br> 

              <input  type="submit" align="right" value="Inserisci"> <br><br>

              <script type="text/javascript">
              
              function Prova() {

                var tag1 = document.getElementById('tag1').value;
                var tag2 = document.getElementById('tag2').value;
                var tag3 = document.getElementById('tag3').value;

                if(tag1 == ""){
                    alert("Il campo tag1 è obbligatorio.");
                    document.getElementById('tag1').focus();
                    return false;
                }

                if(tag2 == ""){
                    alert("Il campo tag2 è obbligatorio.");
                    document.getElementById('tag2').focus();
                    return false;
                }

                if(tag3 == ""){
                    alert("Il campo tag3 è obbligatorio.");
                    document.getElementById('tag3').focus();
                    return false;
                }
                return true;
            } 
              </script>
        
        	</table>
           </form>
       </center>

       
</body>
</html>