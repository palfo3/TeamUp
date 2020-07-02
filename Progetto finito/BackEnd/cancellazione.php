<!-- Idea bottone cancella
-->



<?php
function getPassword(){return "admin";}

echo "la mail inserita è: ".$_POST['mail'];
echo "<br>la password è: ".$_POST['password'];
$host = "localhost";
$user = "root";
$pass = getPassword();
$db = "db_ing";

$conn = mysqli_connect($host, $user, $pass, $db);
$sql = "SELECT * FROM utente WHERE mail LIKE '".$_POST['mail']."'";
$result= $conn->query($sql);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	echo"<br><br> i dati sono:<br>mail: ".$row['mail']."<br>pass: ".$row['password']."<br> nome e cognome: ".$row['Nome']."  ".$row['Cognome'];
}
if($_POST['password']==$row['password']){

	//$sql = "DELETE FROM utente WHERE mail LIKE '".$_POST['mail']."'";
	require "../BackEnd/db_utente.php";
        $array = array("mail" => "",
                  //  "nome" => $data['given_name'],
                   // "cognome" => $data['family_name'],
                    "password" => "");
                   // "descrizione" => "");
        $utente = new db_utente();
        $utente->delete_Account($array);
	if($conn->query($sql) === TRUE){
		echo"<br> <hr> account eliminato";
	}
}else{
		header("location: elimina.html");
	}


?>
