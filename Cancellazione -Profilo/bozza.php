<?php

echo "la mail inserita è: ".$_POST['mail'];
echo "<br>la password è: ".$_POST['password'];

$conn = mysqli_connect('localhost', 'root', '', 'db_ing');
$sql = "SELECT * FROM utente WHERE mail LIKE '".$_POST['mail']."'";
$result= $conn->query($sql);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	echo"<br><br> i dati sono:<br>mail: ".$row['mail']."<br>pass: ".$row['password']."<br> nome e cognome: ".$row['Nome']."  ".$row['Cognome'];
}


if($_POST['password']==$row['password']){

	
	require "../BackEnd/db_utente.php";

	$utente->deleteAccount($_POST['mail']);
	header("location: index.html");

}else{
	header("location: elimina.html");
}

?>
