<?php

$flag = false;

if(isset($_POST['hashedPassword'])) {
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$email = $_POST['email'];
	$password = $_POST['hashedPassword'];

	require "BackEnd/db_utente.php";
	$utente = new db_utente(); 
	if($utente->checkUtente($email)){       
		$array = array("mail" => $email,
			"nome" => $nome,
			"cognome" => $cognome,
			"password" => $password,
			"descrizione" => "");
		$utente = new db_utente();
		$utente->register($array); 

		$flag = false;
	} else {
		$flag = true;
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
	
	<script type="text/javascript">
		function controllo(){
			
			
			var password = document.getElementById("password").value;
			var conferma = document.getElementById("confermaPassword").value;
			if(password == conferma){

				document.getElementById("hashedPassword").value = sha256(password);
				//document.getElementById("password").pattern = "^[^]*$";
				return true;
			}else{
				document.getElementById("confermaPassword").classList.add("is-invalid");
				return false;
			}
		}
	</script>
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
		<form style="color: white;" onsubmit="return controllo();" action="Registrazione.php" method="POST">
			<div class="form-group">
				<table style="background-color: #343a40;">

					<tr>
						<td height="10rem">
							
						</td>
					</tr>

					<tr>
						<td colspan="5">
							<div class="titolo" style="text-align: center;">
								Registrazione
							</div>
						</td>
					</tr>

					<tr>
						<td width="10rem"></td>
						<td>
							<label for="nome">Nome</label>
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" pattern="[a-zA-Z]{2,40}" >
						</td>
						<td width="10rem"></td>
						<td>
							<label for="cognome">Cognome</label>
							<input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome" pattern="[a-zA-Z]{2,50}">
						</td>
						<td width="10rem"></td>
					</tr>

					

					<tr>
						<td width="10rem"></td>
						<td colspan="3">
							<div class="container-fluid">
								<label for="email">Email</label>
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
						<td>
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,32}$">
						</td>
						<td width="10rem"></td>
						<td>
							<label for="password">Conferma password</label>
							<input type="password" class="form-control" id="confermaPassword" placeholder="Conferma password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,32}$">
						</td>
						<td width="10rem"></td>
					</tr>

					<tr>
						<td height="30rem">
							
						</td>
					</tr>

					<tr>
						<td colspan="5">
							<div style="text-align: center;">
								<button type="submit" class="btn btn-primary" id="hashedPassword" name="hashedPassword" onclick="controllo()">Registrati</button>
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

