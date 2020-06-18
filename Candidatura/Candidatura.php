<?php

$_SESSION['mail'] = "emanuele@mail.it";   //email di sessione

$progetto = "2";  //ultimo progetto cercato, il quale verrà passato alla registrazione candidato

// Uploads files
if(isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['file']['name'];

    // destination of the file
    $destination = 'curriculum/'.$filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['file']['tmp_name'];  //percorso e il nome del file temporaneo sul server
    $size = $_FILES['file']['size'];   //dimensione e nome del file caricatp

    // move the uploaded (temporary) file to the specified destination
    if(move_uploaded_file($file, $destination)){

    	require "../BackEnd/db_candidato.php";
  		$candidato = new db_candidato();

      require "../BackEnd/db_progetto.php";
      $progetto = new db_progetto();

	    //Registrazione progetto
	    $array = array("mailUtente" => $_SESSION['mail'],
	            "progettoID" => , $progetto, 
	            "accettato" => "0",
	            "curriculum" => $filename);
	    $candidato->register($array); 
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
         <form action="Candidatura.php" method="POST" enctype="multipart/form-data">
            <table border="1" align="center"> <br>

              <input type="file" name="file">
              <input type="submit" name="save" value="Carica file">

            </table>
         </form>
    </center>
</body>
</html>