<!-- Idea bottone cancella
-->

<?php

$mail = "";
$password = "";

 if(isset($_POST['mail'])){
    $mail = $_POST['mail'];
}

if(isset($_POST['password'])){
    $password = $_POST['password']; 
}

$conn = mysqli_connect('localhost', 'root', '', 'db_ing');
$sql = "SELECT * FROM utente WHERE mail LIKE '".$mail."'";
$result= $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();

    if($_POST['password']==$row['password']){

		//$sql = "DELETE FROM utente WHERE mail LIKE '".$_POST['mail']."'";
    	require "../BackEnd/db_utente.php";
    	$utente = new db_utente();
    	$utente->deleteAccount($mail);
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
           <form  ACTION="cancellazione.php" METHOD = POST>
             <table border="1" align="center"> <br>
             	
 				<input  type="text" id="mail" name="mail" size="30"  placeholder="Email"> <br> <br>
               
                <input  type="password" id="password" name="password" size="30" placeholder="Password"> 
                <br> <br>
                             
                <input  type="submit" align="right" id="login_btn" value="Elimina"> <br><br>

        	</table>
           </form>
       </center>
</body>
</html>
