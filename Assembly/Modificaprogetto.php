	<?php

	session_start();

	if(empty($_SESSION)) {
    // session isn't started
		header('Location: index.php');
	}

	require 'BackEnd/db_progetto.php';

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

	<body style="background-color: #9BA4AF;" onload="start()">

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
					<form class="form-inline my-2 my-lg-0" action="cerca.php" method="POST">
						<input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Search" name="cerca">
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
		<br>

		<table align="center" style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;padding: 20px;">
			<tr>
				<td width="50rem">
				</td>

				<td align="center">
					<div class="titolo">
						Modifica progetto
					</div>
				</td>

				<td width="50rem">
				</td>		
			</tr>
			<tr>
				<td width="50rem">
				</td>

				<td align="center">

					Nome

					<br>

					<input type="text" name="nome" class="form-control" <?php echo "value=\"".$progetto->getNome()."\"" ?>>
					
				</td>
				<td width="50rem">
				</td>		
			</tr>
			<tr>
				<td width="50rem">
				</td>

				<td align="center">

					Descrizione

					<br>

					<textarea class="form-control" id="descrizione" name="descrizione" rows="3" maxlength="255"> <?php echo $progetto->getDescrizione(); ?></textarea>
					
				</td>
				<td width="50rem">
				</td>		
			</tr>
			<tr>
				<td width="50rem">
				</td>

				<td align="center">

					Tag

					<br>

					<input type="text" class="form-control" name="tag" data-role="tagsinput"/>
					
				</td>
				<td width="50rem">
				</td>		
			</tr>
		</table>


		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
		</script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
		</script>
		<script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
		<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

		<script type="text/javascript">
			
			function start() {
				$('input[name="tag"]').tagsinput('add', 'some tag');
				$('input[name="tag"]').tagsinput('add', 'some tag');
				$('input[name="tag"]').tagsinput('add', 'some tag');
				$('input[name="tag"]').tagsinput('add', 'some tag');
				$('input[name="tag"]').tagsinput('add', 'some tag');
			}


			function loadtag() {

				var array = $('input[name="tag"]').val().split(',');
				document.getElementById("tag1").value = array[0];
				document.getElementById("tag2").value = array[1];
				document.getElementById("tag3").value = array[2];
				document.getElementById("tag4").value = array[3];
				document.getElementById("tag5").value = array[4];

			}

			


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

