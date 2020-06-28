	<?php

	session_start();

	if(empty($_SESSION)) {
    // session isn't started
		header('Location: index.php');
	}

	?>

	<!DOCTYPE html>
	<html>

	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

		<title>TeamUp</title>
		<link rel="stylesheet" href= "Style.css">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
		<br>

		<center>
			<table style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;width: 50rem;">
				<tr>
					<td height="10rem" colspan="3">
					</td>
				</tr>

				<tr>
					<td width="5rem">
					</td>
					<td colspan="3">
						<center class="titolo" >Nuovo progetto</center>				
					</td>
					<td width="5rem">
					</td>
				</tr>

				<tr>
					<td height="20rem">
					</td>
				</tr>

				<tr>
					<td width="5rem">
					</td>
					<td colspan="3">
						<center>
							Nome progetto
							<br>
							<input type="text" id="nome" name="nome progetto" class="form-control" placeholder="Nome">
						</center>
					</td>	
					<td width="5rem">
					</td>
				</tr>

				<tr>
					<td height="10rem">
					</td>	
				</tr>

				<tr>
					<td width="5rem">
					</td>
					<td colspan="3">
						<center>
							Descrizione progetto
							<textarea class="form-control" id="descrizione" name="descrizione" rows="3" maxlength="255" placeholder="Descrizione progetto"></textarea>
						</center>
					</td>	
					<td width="5rem">
					</td>
				</tr>

				<tr>
					<td height="10rem">
					</td>	
				</tr>

				<tr>
					<td width="5rem">
					</td>
					<td>
						<center>
							Data scadenza
							<br>
							<input type="date" class="form-control" id="date" name="data_creazione" min="" placeholder="Data scadenza">
						</center>
					</td>	
					<td width="5rem">
					</td>
				</tr>

				<tr>
					<td height="10rem">
					</td>	
				</tr>

				<tr>
					<td width="5rem">
					</td>
					<td>
						<center>
							Tag
							<a href="#" data-toggle="tooltip" title="l'aggiunta di tag rende più semplice la ricerca del progetto dal sistema"><ion-icon name="information-circle-outline"></ion-icon></a>
							<br>
							<input type="text" name="tag" data-role="tagsinput"/>
						</center>
					</td>	
					<td width="5rem">
					</td>
				</tr>

				<tr>
					<td height="10rem">
					</td>	
				</tr>

				<tr>
					<td height="5rem">
					</td>	
					<td colspan="3">
						<center>
							<button type="submit" class="btn btn-primary" name="Crea">Crea</button>
						</center>
					</td>	
					<td height="5rem">
					</td>	
				</tr>

				<tr>
					<td height="10rem">
					</td>	
				</tr>
			</table>
		</center>


		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
		</script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
		</script>
		<script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
		<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

		<script type="text/javascript">
			$('input[name="tag"]').tagsinput({
				maxTags: 5,
				maxChars: 20
			});
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();   
			});
		</script>
	</body>

	</html>

