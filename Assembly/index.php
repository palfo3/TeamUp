<?php

session_start();

$flag = false;

if(!empty($_SESSION)) {
    // session isn't started
	header('Location: Homepage.php');
}

if(isset($_POST['google_mail'])) {
	if($_POST['google_mail'] != "" ){

		$_SESSION['nome'] = $_POST['google_nome'];
		$_SESSION['cognome'] = $_POST['google_cognome'];
		$_SESSION['mail'] = $_POST['google_mail'];
		$_SESSION['img'] = $_POST['google_img'];


        //registrazione nel database
		require "BackEnd/db_utente.php";
		$utente = new db_utente(); 
		if($utente->checkUtente($_POST['google_mail'])){       
			$array = array("mail" => $_POST['google_mail'],
				"nome" => $_POST['google_nome'],
				"cognome" => $_POST['google_cognome'],
				"password" => "NULL",
				"descrizione" => "");
			$utente = new db_utente();
			$utente->register($array); 
		}

		header('Location: Homepage.php');
	}
}

if(isset($_POST['email']) && isset($_POST['password'])){
	
	$mail = $_POST['email'];

	$password =  $_POST['hashedPassword']; 

	require "BackEnd/db_utente.php";

	$utente = new db_utente(); 

	if($utente->access_User($mail, $password)){
		header("location: Homepage.php");
	}else{
		$flag = true;
		session_destroy();
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

	<meta name="google-signin-scope" content="profile email">
	<meta name="google-signin-client_id" content="953839603005-j6b0j5flahopjnb72n39chicm0r17dqg.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer></script>

	<script type="text/javascript">
		function hashlogin(){
			document.getElementById("hashedPassword").value = sha256(document.getElementById("password").value);
		}
	</script>

	<script>
		function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        document.getElementById("google_mail").value = profile.getEmail();
        document.getElementById("google_nome").value = profile.getGivenName();
        document.getElementById("google_cognome").value = profile.getFamilyName();
        document.getElementById("google_img").value = profile.getImageUrl();

        document.getElementById("google").submit();
    }
</script>

</head>

<body style="background-color: #9BA4AF;">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="box-shadow: 0 5px 20px 13px #545b62 !important;">
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
		<form style="color: white;" action="index.php" method="POST" id="google">

			<input type="hidden" name="google_mail" id="google_mail">
			<input type="hidden" name="google_nome" id="google_nome">
			<input type="hidden" name="google_cognome" id="google_cognome">
			<input type="hidden" name="google_img" id="google_img">


			<div class="form-group">
				<table style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;">

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
								<button type="submit" class="btn btn-primary" id="hashedPassword" name="hashedPassword" onclick="hashlogin()">Accedi</button>
							</div>
						</td>

						<td>

						</td>

						<td colspan="2">
							<center>
								<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" name="google"></div>
							</center>
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

