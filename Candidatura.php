<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'db_ing');

$utente = "emanuele@mail.it";
$progetto = "2";
$accettato = "0";

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['file']['name'];

    // destination of the file on the server
    $destination = 'curriculum/'.$filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];

    // move the uploaded (temporary) file to the specified destination
    if(move_uploaded_file($file, $destination)){
        $sql = "INSERT INTO candidato (utente, progetto, accettato, curriculum) VALUES ('".$utente."', '".$progetto."', '".$accettato."', '".$filename."')";

        if(mysqli_query($conn, $sql)){
            echo "File uploaded successfully";
        }else{
        echo "Failed to upload file.";

    	}
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
          <form  ACTION="CandidaturaProgetto.php" METHOD = "POST">
            <table border="1" align="center"> <br>
              
              <input type="text" id="progetto" name="progetto" size="30" placeholder="Descrizione"> <br><br>

            </table>
          </form>

          <form action="Candidatura.php" method="POST" enctype="multipart/form-data">
            <table border="1" align="center"> <br>

              <input type="file" name="file">
              <input type="submit" name="save" value="Carica file">

            </table>
          </form>
    </center>
</body>
</html>