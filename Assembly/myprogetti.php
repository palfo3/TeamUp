	<?php

	session_start();

	if(empty($_SESSION)) {
    // session isn't started
		header('Location: index.php');
	}

	require "BackEnd/db_progetto.php";

	$db_progetti = new db_progetto();

	require "BackEnd/db_candidato.php";

	$db_candidato = new db_candidato();

	$resultp = $db_candidato->setAllProgetti($_SESSION['mail']);

	$result = $db_progetti->getMyProgetti($_SESSION['mail']);

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

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="box-shadow: 0 5px 20px 13px #545b62 !important;">
			<div class="container-fluid">
				<div class="col-4"> 
					<a class="navbar-brand" href="index.php">
						<div class="titolo">
							TeamUp
						</div>
					</a> 
				</div>
				<div class="col-6"> 
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Search">
						<button class="btn btn-outline-light my-2 my-sm-0 btn-sm" type="submit">Cerca</button>
					</form>
				</div>
				<div class="col-0">
					<ul>
						<li>
							<a href="#">
								<div class="d-none d-sm-block">
									
									<div class="dropdown">
										<br>
										<a class="btn dropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
											<?php

											echo $_SESSION['nome']." ".$_SESSION['cognome']."&nbsp;";

											if(isset($_SESSION['img'])){
												echo "<img style=\"float:right\" src=\"".$_SESSION['img']."\" class=\"imgprofile\">";	
											} else {
												echo "<img style=\"float:right\"  src=\"Img/profile.png\" class=\"imgprofile\">";
											}

											

											?>
										</a>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="profilo.php">Profilo</a>
											<a class="dropdown-item" href="#">Progetti</a>
											<a class="dropdown-item" href="Logout.php">Logout</a>
										</div>
									</div>
								</div>
							</a>						
						</li>
					</ul>	
				</div>
			</div>
		</nav>

		<br>
		<br>

		<div style="text-align: right;padding-right: 6.3rem;">
			<a href="nuovoprogetto.php" class="btn btn-dark"><svg class="bi bi-file-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path d="M9 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8h-1v5a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5V1z"/>
				<path fill-rule="evenodd" d="M13.5 1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V1.5a.5.5 0 0 1 .5-.5z"/>
				<path fill-rule="evenodd" d="M13 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
			</svg></a>
		</div>

		<br>

		<?php

		

		if ($result != null) {

			echo "
			<center>
			
			<div class=\"container-fluid\">
			<div class=\"row\">
			<div class =\"col-5\">
			
			<br>
			
			<b>Miei progetti</b>";

			for($i = 0; $i < $result->num_rows; $i++) {
				
				$value = $result->fetch_assoc();

				echo "
				
				
				
				<a href=\"progetto.php?id=".$value['ID']."\" style=\"text-decoration: none;\">
				<table style=\"background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;\">
				<tr>
				<td height=\"10rem\">

				</td>
				</tr>

				<tr>
				<td width=\"50rem\">
				</td>
				<td>
				".$value['nome']."
				</td>
				<td width=\"500rem\">
				</td>
				<td>
				".$value['data_scadenza']."
				</td>
				<td width=\"50rem\">
				</td>
				</tr>

				<tr>
				<td height=\"30rem\">
				</td>
				</tr>

				<tr>
				<td width=\"50rem\">
				</td>
				<td>
				<span style=\"display:block;text-overflow: ellipsis;width: 30rem;overflow: hidden; white-space: nowrap;\">
				".$value['descrizione']."
				</span>
				</td>

				</tr>

				<tr>
				<td height=\"10rem\">
				</td>
				</tr>
				</table>
				</a>
				<br>
				";
			}
		}

		echo "

		</div>
		<div class =\"col-2\">
		</div>
		<div class =\"col-5\">
		<br>
		<b>Progetti candidato</b>";

		if ($resultp != null) {

			for($i = 0; $i < $resultp->num_rows; $i++) {
				
				$value = $resultp->fetch_assoc();

				$prog = $db_progetti->setProgetto($value['progetto']); 

				echo "
				<a href=\"progetto.php?id=".$value['progetto']."\" style=\"text-decoration: none;\">
				<table style=\"background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;\">
				<tr>
				<td height=\"10rem\">

				</td>
				</tr>

				<tr>
				<td width=\"50rem\">
				</td>
				<td>
				".$prog->getNome()."
				</td>
				<td width=\"500rem\">
				</td>
				<td>
				".$prog->getData_scadenza()."
				</td>
				<td width=\"50rem\">
				</td>
				</tr>

				<tr>
				<td height=\"30rem\">
				</td>
				</tr>

				<tr>
				<td width=\"50rem\">
				</td>
				<td>
				<span style=\"display:block;text-overflow: ellipsis;width: 30rem;overflow: hidden; white-space: nowrap;\">
				".$prog->getDescrizione()."
				</span>
				</td>

				</tr>

				<tr>
				<td height=\"10rem\">
				</td>
				</tr>
				</table>
				</a>
				<br>

				";

			}
			echo "</div>

			</div>
			</div>
			</center>

			";
		}
		?>


		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
		</script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
		</script>

	</body>

	</html>

