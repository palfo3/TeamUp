<?php

include "Config.php";

if(isset($_GET["code"])){

	$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

	if(!isset($token['error'])){

		$google_client->setAccessToken($token['access_token']);

		$_SESSION['access_token'] = $token['access_token'];

		$google_service = new Google_Service_Oauth2($google_client);

		$data = $google_service->userinfo->get();

        //isset: Determina se una variabile è dichiarata ed è diversa da NULL 
		if(!isset($data['given_name'])){
			$_SESSION['user_first_name'] = $data['given_name'];
		}

		if(!isset($data['family_name'])){
			$_SESSION['user_last_name'] = $data['family_name'];
		}

		if(!isset($data['email'])){
			$_SESSION['user_email_address'] = $data['email'];
		}



        //registrazione nel database
		require "BackEnd/db_utente.php";
		$array = array("mail" => $data['email'],
			"nome" => $data['given_name'],
			"cognome" => $data['family_name'],
			"password" => "NULL",
			"descrizione" => "");
		$utente = new db_utente();
		$utente->register($array);
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
		<form style="color: white;">
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
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">								
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
								<label for="email">Password</label>
								<input type="password" class="form-control" id="password" placeholder="Password">								
							</div>

						</td>
						<td width="10rem"></td>
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
									if(!isset($_SESSION['access_token'])){
										echo'<a href = "'.$google_client->createAuthUrl().'" class="btn btn-primary">Google</a>';
									}
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

