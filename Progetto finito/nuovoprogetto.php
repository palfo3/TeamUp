	<?php

	session_start();

	if(empty($_SESSION)) {
    // session isn't started
		header('Location: index.php');
	}

	if(isset($_POST['Crea'])) {

		require "BackEnd/db_progetto.php";
		require "BackEnd/db_tag.php";
		require "BackEnd/db_associaTag.php";

		$data_creazione = date("Y-m-d");
		$data_scadenza = $_POST['scadenza'];

		$progetto = new db_progetto();

		if($_POST['nome'] != "" && $_POST['descrizione'] != ""){
     		//Registrazione progetto
			$array = array("leader" => $_SESSION['mail'],
				"nome" => $_POST['nome'],
				"descrizione" => $_POST['descrizione'],
				"data_scadenza" => $data_scadenza,
				"data_creazione" => $data_creazione);
			$progetto->register($array); 

			$db_tag = new db_tag();

			if($_POST["tag1"] != "")
				$db_tag->register($_POST["tag1"]);

			if($_POST["tag2"] != "")
				$db_tag->register($_POST["tag2"]);

			if($_POST["tag3"] != "")
				$db_tag->register($_POST["tag3"]);

			if($_POST["tag4"] != "")
				$db_tag->register($_POST["tag4"]);

			if($_POST["tag5"] != "")
				$db_tag->register($_POST["tag5"]);

			$associaTag = new db_associaTag();  

			$array = array("progetto" => $progetto->search_id($_SESSION['mail'], $data_creazione),
				"tag" => $_POST["tag1"],
				"posizione" => "0");

			$associaTag->register($array);

			$array = array("progetto" =>$progetto->search_id($_SESSION['mail'], $data_creazione),
				"tag" => $_POST["tag2"],
				"posizione" => "1");
			$associaTag->register($array); 

			$array = array("progetto" => $progetto->search_id($_SESSION['mail'], $data_creazione),
				"tag" => $_POST["tag3"],
				"posizione" => "2");
			$associaTag->register($array); 

			$array = array("progetto" =>$progetto->search_id($_SESSION['mail'], $data_creazione),
				"tag" => $_POST["tag4"],
				"posizione" => "3");
			$associaTag->register($array); 

			$array = array("progetto" => $progetto->search_id($_SESSION['mail'], $data_creazione),
				"tag" => $_POST["tag5"],
				"posizione" => "4");
			$associaTag->register($array);

			header('location: myprogetti.php');
		}
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

		<form action="nuovoprogetto.php" method="POST" onsubmit = "loadtag()">
			<div align="center">
				<table style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;width: 50rem;">
					<tr>
						<td height="10rem" colspan="3">
						</td>
					</tr>

					<tr>
						<td width="5rem">
						</td>
						<td colspan="3">
							<div align="center" class="titolo" >Nuovo progetto</div>				
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
							<div align="center">
								Nome progetto
								<br>
								<input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required>
							</div>
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
							<div align="center">
								Descrizione progetto
								<textarea class="form-control" id="descrizione" name="descrizione" rows="3" maxlength="255" placeholder="Descrizione progetto" required></textarea>
							</div>
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
							<div align="center">
								Data scadenza
								<br>
								<input type="date"  class="form-control" id="scadenza" name="scadenza" 
								<?php
								$date=date_create(date("Y-m-d"));
								echo "min=\"".date_format($date,"Y-m-d")."\" ";
								date_add($date,date_interval_create_from_date_string("1 year"));
								echo "max=\"".date_format($date,"Y-m-d")."\"";
								?>
								 required>
							</div>
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
							<div align="center">
								Tag
								<a href="#" data-toggle="tooltip" style="color: white;" title="l'aggiunta di tag rende più semplice la ricerca del progetto dal sistema, dopo ogni tag inserire ',' [massimo 5]"><ion-icon name="information-circle-outline"></ion-icon></a>
								<br>
								<input type="text" class="form-control" name="tag" data-role="tagsinput"/>

								<input type="hidden" id="tag1" name="tag1">
								<input type="hidden" id="tag2" name="tag2">
								<input type="hidden" id="tag3" name="tag3">
								<input type="hidden" id="tag4" name="tag4">
								<input type="hidden" id="tag5" name="tag5">
							</div>
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
							<div align="center">
								<button type="submit" class="btn btn-primary" name="Crea">Crea</button>
							</div>
						</td>	
						<td height="5rem">
						</td>	
					</tr>

					<tr>
						<td height="10rem">
						</td>	
					</tr>
				</table>
			</div>
		</form>


		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
		</script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
		</script>
		<script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
		<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

		<script type="text/javascript">
			
			


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

