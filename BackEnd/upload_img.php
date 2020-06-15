<?php 

	include ('chiave.php');

	$db = mysql_connect($host,$user,$pwd);
	if($db==FALSE)die("impossibile connettersi al db:".mysql_error());
	mysql_select_db($datab,$db) or die ("Impossibile selezionare il database:".mysql_error());
	if(!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])){
		exit();
	}

	$uploaddir = '/immagini';
	$userfile_tmp = $_FILES['userfile']['tmp_name'];
	$userfile_name = $_FILES['userfile']['name'];

	if(move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)){
		$insert = "UPDATE utente SET immagine = '".$uploaddir.$userfile_name."' WHERE mail LIKE 'daniele@mail.it'";
		$result = mysql_query($insert, $db);
		if($result==FALSE) die ("La seguente query è sbagliata: $insert");
		//header("Location: index.php");
	}else{
		echo "Upload non riuscito"
	}
	mysql_close($db);

	?>

	