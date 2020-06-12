<?php

include "Config.php";

session_start();

$flag = false;

if(!empty($_SESSION)) {
    // session isn't started
	header('Location: Homepage.php');
}


if(isset($_GET["code"])){

	$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

	if(!isset($token['error'])){

		$google_client->setAccessToken($token['access_token']);

		$_SESSION['access_token'] = $token['access_token'];

		$google_service = new Google_Service_Oauth2($google_client);

		$data = $google_service->userinfo->get();


		$_SESSION['nome'] = $data['given_name'];
		

		$_SESSION['cognome'] = $data['family_name'];
		

		$_SESSION['mail'] = $data['email'];
		



        //registrazione nel database
		require "BackEnd/db_utente.php";
		$utente = new db_utente(); 
		if($utente->checkUtente($data['email'])){       
			$array = array("mail" => $data['email'],
				"nome" => $data['given_name'],
				"cognome" => $data['family_name'],
				"password" => "NULL",
				"descrizione" => "");
			$utente = new db_utente();
			$utente->register($array); 
		}
		
		header('Location: Homepage.php');
	}
}

if(isset($_POST['email']) || isset($_POST['password'])){

	if(isset($_POST['mail'])){
		$mail = $_POST['mail'];
	}

	if(isset($_POST['password'])){
		$password = $_POST['password']; 
	}

	require "../BackEnd/db_utente.php";
	$utente = new db_utente(); 

	if($utente->access_User($mail, $password) == TRUE){
		header("location: Homepage.php");
	}else{
		echo '<script type="text/javascript">
		alert("Email o password non corretti. Premi OK per re-inserirli");
		window.location= "index.php";
		</script>';
	}   
}


?>


<!DOCTYPE html>
<html>

<head>

	<title>TeamUp</title>
	<link rel="stylesheet" href= "Style.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>

<body style="background-color: #9BA4AF;">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<div class="titolo navbar-brand" style="font-size: 2.25rem !important;">
				TeamUp
			</div>
		</div>
		<button class="btn btn-outline-light my-2 my-sm-0 btn-sm" type="submit" id="Registrati" onclick="Registrati()">Registrati</button>
	</nav>

	<br>
	<br>
	<br>

	<center>
		<form style="color: white;" action="index.php" method="POST" onsubmit="return hashlogin();">
			<div class="form-group">
				<table style="background-color: #343a40;">

					<tr>
						<td height="10rem">

						</td>
					</tr>

					<tr>
						<td colspan="5">
							<div class="titolo" style="text-align: center;" onclick="">
								Accedi
							</div>
						</td>
					</tr>				

					<tr>
						<td width="10rem"></td>
						<td colspan="3">
							<div class="container">
								<label for="email" style="color: white;">Email</label>
								<?php

								if($flag) {
									echo "<input type=\"email\" class=\"form-control is-invalid\" id=\"email\" name=\"email\" placeholder=\"Email\">";
								} else {
									echo "<input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Email\">";
								}

								?>								
							</div>

						</td>
						<td width="10rem"></td>
					</tr>

					<tr>
						<td height="10rem">

						</td>
					</tr>

					<tr>
						<td width="10rem"></td>
						<td colspan="3">
							<div class="container-fluid">
								<label for="email" style="color: white;">Password</label>
								<?php

								if($flag) {
									echo "<input type=\"password\" class=\"form-control is-invalid\" id=\"password\" name=\"password\" placeholder=\"password\">";
								} else {
									echo "<input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"password\">";
								}

								?>							
							</div>

						</td>
						<td width="10rem"></td>
					</tr>

					<tr>
						<td height="10rem">

						</td>
					</tr>

					<tr>
						<td height="10rem" colspan="5">
							<center>
								<a href="recovery_password.php">Hai dimenticato la password?</a>
							</center>
						</td>
					</tr>	

					<tr>
						<td height="10rem">

						</td>
					</tr>				

					<tr>
						<td colspan="2">
							<div style="text-align: center;">
								<button type="submit" class="btn btn-primary">Accedi</button>
							</div>
						</td>

						<td>

						</td>

						<td colspan="2">
							<div style="text-align: center;">

								<?php
								echo'<a href = "'.$google_client->createAuthUrl().'" class="btn btn-primary">Google</a>';
								?>

							</div>
						</td>
					</tr>

					<tr>
						<td height="10rem">

						</td>
					</tr>

				</table>
			</div>

		</form>
	</center>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
	</script>
	<script type="text/javascript" src="Script.js"></script>

</body>

</html>

