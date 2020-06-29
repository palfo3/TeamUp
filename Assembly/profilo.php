<?php

session_start();

if(empty($_SESSION)) {
    // session isn't started
	header('Location: index.php');
}

require 'BackEnd/db_utente.php';

if(isset($_POST['save'])) {



	$array = array(
		"mail" => $_POST['mail'],
		"nome" => $_POST['nome'],
		"cognome" => $_POST['cognome'],
		"nascita" => $_POST['nascita'],
		"password" => "NULL",
		"descrizione" => $_POST['descrizione']);

	$modifica = new utente($array);

	$utente = new db_utente();
	$utente->setUtente($_SESSION['mail']);


	if($utente->getUtente()->getNome() != $modifica->getNome())
	{
		$utente->updateNome($utente->getUtente()->getMail(), $modifica->getNome());
	}

	if($utente->getUtente()->getCognome() != $modifica->getCognome())
	{
		$utente->updateCognome($utente->getUtente()->getMail(), $modifica->getCognome());
	}

	if($utente->getUtente()->getDescrizione() != $modifica->getDescrizione())
	{
		$utente->updateDescrizione($utente->getUtente()->getMail(), $modifica->getDescrizione());
	}

	if($utente->getUtente()->getNascita() != $modifica->getNascita())
	{
		$utente->updateNascita($utente->getUtente()->getMail(), $modifica->getNascita());
	}
}

$row = new db_utente();

$row->setUtente($_SESSION['mail']);

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
										<a class="dropdown-item" href="#">Profilo</a>
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

	<div class="container">
		<div class="row">
			<div class="col-4">
				<div style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;padding: 20px;">
					<?php

					if(isset($_SESSION['img'])){
						echo "<img style=\"float:left\" src=\"".$_SESSION['img']."\" class=\"imgprofile\">&nbsp;";	
					} else {
						echo "<img style=\"float:left\" src=\"Img/profile.png\" class=\"imgprofile\">&nbsp;";
					}
					echo $_SESSION['nome']." ".$_SESSION['cognome'];

					?>
				</div>
				<br>
				<br>
				<br>
				<br>

				<div style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;padding: 20px;">
					<center>
					<label for="password">Cambia password</label><br>
					<a href="new_password.php" class="btn btn-primary">cambia</a>
					</center>
				</div>
				

				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>				

				<form action="profilo.php" method="POST" style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;padding: 20px;">
					<center>
					<label for="password">Elimina profilo</label><br>
					<a href="EliminaProfilo.php" class="btn btn-danger">Cancella</a>
					</center>
				</form>
			</div>
			<div class="col-8">
				
				<form action="profilo.php" method="POST" style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;padding: 20px;">
					<div class="form-group">
						<label for="Nome">Nome</label>
						<input type="text" class="form-control" name="nome" id="Nome" aria-describedby="Nome" <?php echo "value=\"".$row->getUtente()->getNome()."\""; ?>>
					</div>
					<div class="form-group">
						<label for="Cognome">Cognome</label>
						<input type="text" class="form-control" name="cognome" id="Cognome" <?php echo "value=\"".$row->getUtente()->getCognome()."\""; ?>>
					</div>
					<div class="form-group">
						<label for="Email">Email</label>
						<br>
						<label> <?php echo $row->getUtente()->getMail(); ?> </label>
					</div>
					<div class="form-group">
						<label for="data">Data di nascita</label>
						<input type="date" class="form-control" name="nascita" id="data" <?php echo "value=\"".$row->getUtente()->getNascita()."\""; ?>>
					</div>
					<div class="form-group">
						<label for="descrizione">Descrizione</label>
						<textarea class="form-control" id="descrizione" name="descrizione" rows="3" maxlength="255"><?php echo $row->getUtente()->getDescrizione(); ?></textarea>
					</div>
					<button type="submit" class="btn btn-primary" name="save">Salva</button>
				</form>
			</div>
		</div>
	</div>

	<br>
	<br>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
	</script>

</body>

</html>
