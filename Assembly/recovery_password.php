<?php

if (isset($_POST['mail'])) {
	# code...


	$mail = $_POST['mail'];

// use wordwrap() if lines are longer than 70 characters

	$pass_app = generaStringaRandom(10);
	$msg = wordwrap("La nuova password è: ".$pass_app, 70);

// send email
	mail($mail,"My subject", $msg);

	require "BackEnd/db_utente.php";
	$utente = new db_utente(); 
	$utente->updatePassword($mail, $pass_app);

//Togliere di default la mia email
//Dopo aver mandato all'utente la nuova password, egli può decidere se CAMBIARE PASSWORD inserendo quella attuale e quella nuova. (Sono due item diversi??) 
}

function generaStringaRandom($lunghezza) {
	$caratteri = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$stringaRandom = '';
	for ($i = 0; $i < $lunghezza; $i++) {
		$stringaRandom .= $caratteri[rand(0, strlen($caratteri) - 1)];
	}
	return $stringaRandom;
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
		<button class="btn btn-outline-light my-2 my-sm-0 btn-sm" type="submit" onclick="login()">Accedi</button>
	</nav>


	<br>
	<br>
	<br>

	<center>
		<form  ACTION="recovery_password.php" METHOD = POST>
			<div class="form-group">
				<table style="background-color: #343a40;">
					
					<tr>
						<td height="10rem">

						</td>
					</tr>

					<tr>
						<td colspan="5">
							<div class="titolo" style="text-align: center;">
								Recovery password
							</div>
						</td>
					</tr>

					<tr>
						<td height="10rem">

						</td>
					</tr>

					<tr>
						<td width="10rem"></td>
						<td colspan="3">
							<div class="container-fluid">
								<label for="email" style="color: white;">Email</label>
								<input  type="email" id="mail" class="form-control"  name="mail" size="30" pattern="^([A-Z|a-z|0-9](\.|_){0,1})+[A-Z|a-z|0-9]\@([A-Z|a-z|0-9])+((\.){0,1}[A-Z|a-z|0-9]){2}\.[a-z]{2,3}$" placeholder="Mail">						
							</div>

						</td>
						<td width="10rem"></td>
					</tr>

					<tr>
						<td height="10rem">

						</td>
					</tr>

					<tr>
						<td colspan="5">
							<div style="text-align: center;">
								<button  type="submit" class="btn btn-primary" id="login_btn" value="submit">Recovery</button>
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