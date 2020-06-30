	<?php

	session_start();

	if(empty($_SESSION)) {
    // session isn't started
		header('Location: index.php');
	}


	if(isset($_POST['delete'])) {
		require "BackEnd/db_progetto.php"; 

		$progetto = new db_progetto();
		$progetto->delete($_POST['id']);
		header('Location: myprogetti.php');
	}

	if(isset($_POST['Candidati'])) { 

		require "BackEnd/db_candidato.php";
		$candidato = new db_candidato();

		require "BackEnd/db_progetto.php";
		$progetto = new db_progetto();

	    //Registrazione progetto
		$array = array("mailUtente" => $_SESSION['mail'],
			"progettoID" => $_POST['id'], 
			"accettato" => "0");
		$candidato->register($array); 

		header('Location: myprogetti.php');

	}

	require "BackEnd/db_progetto.php";

	$db_progetto = new db_progetto();

	$progetto = $db_progetto->setProgetto($_GET['id']);



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
											<a class="dropdown-item" href="myprogetti.php">Progetti</a>
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



		<div class="container" <?php if ($progetto == null) { echo "hidden=\"true\""; } ?> >
			<div class="row">
				<div class="col-5">
					<table style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;">
						<tr>
							<td height="10rem">

							</td>
						</tr>

						<tr>
							<td width="10rem">

							</td>
							<td align="center" class="titolo" >
								<?php
								if ($progetto != null) {
									echo $progetto->getNome();
								}
								
								?>
							</td>
							<td width="10rem">

							</td>
						</tr>

						<tr>
							<td height="100rem">

							</td>
						</tr>

						<tr>
							<td width="10rem">

							</td>
							<td>
								data creazione: 
								<?php
								if ($progetto != null) {
									echo $progetto->getData_creazione();
								}
								?>
							</td>
							<td width="10rem">

							</td>
						</tr>

						<tr>
							<td height="20rem">

							</td>
						</tr>

						
						<tr>
							<td width="10rem">

							</td>
							<td>
								data scadenza: 
								<?php
								if ($progetto != null) {
									echo $progetto->getData_scadenza();
								}
								?>
							</td>
							<td width="10rem">

							</td>
						</tr>

						<tr>
							<td height="20rem">

							</td>
						</tr>

						<tr>
							<td width="10rem">

							</td>
							<td>
								<center>
								Mail leader
								<br> 
								<?php
								if ($progetto != null) {
									echo $progetto->getLeader();
								}
								?>
								</center>
							</td>
							<td width="10rem">

							</td>
						</tr>

						<tr>
							<td height="150rem">

							</td>
						</tr>
						<?php
						if ($progetto != null) {
							if($progetto->getLeader() == $_SESSION['mail']) {
								echo "<tr>
								<td height=\"100rem\">

								</td>
								<td>
								<form align=\"center\" action =\"progetto.php\" method=\"POST\">
								<input type=\"hidden\" name=\"id\" value=\"".$_GET['id']."\"\>
								<button type=\"submit\" class=\"btn btn-danger\" name=\"delete\">cancella</button>
								</form>
								</td>
								</tr>";
							}
						}
						?>

						<?php
						if ($progetto != null) {
							if($progetto->getLeader() != $_SESSION['mail']) {
								echo "<tr>
								<td height=\"100rem\">

								</td>
								<td>
								<form align=\"center\" action =\"progetto.php\" method=\"POST\">
								<input type=\"hidden\" name=\"id\" value=\"".$_GET['id']."\"\>
								<button type=\"submit\" class=\"btn btn-primary\" name=\"Candidati\">Candidati</button>
								</form>
								</td>
								</tr>";
							}
						}
						?>
					</table>
				</div>
				<div class="col-7">
					<table style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;">
						<tr>
							<td height="20rem">

							</td>
						</tr>

						<tr>
							<td width="10rem">

							</td>
							<td align="left">
								<span style="display:block;width: 35rem;word-wrap: break-word;white-space: normal;">
									<?php
									if ($progetto != null) {
										echo $progetto->getDescrizione();
									}
									?>
								</span>
							</td>
							<td width="10rem">

							</td>

							<tr>
								<td height="20rem">

								</td>
							</tr>
						</tr>

					</table>
				</div>
			</div>
		</div>

		<center>
			<p <?php if ($progetto != null) { echo "hidden=\"true\""; } ?> style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white; width: 20rem; height: 2rem;">
				progetto non trovato
			</p>
		</center>



		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
		</script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
		</script>

	</body>

	</html>

