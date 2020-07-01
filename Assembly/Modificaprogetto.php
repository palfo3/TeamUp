	<?php

	session_start();

	if(empty($_SESSION)) {
    // session isn't started
		header('Location: index.php');
	}

	if(isset($_POST['save'])) {
		require 'BackEnd/db_progetto.php';
		require "BackEnd/db_tag.php";
		require "BackEnd/db_associaTag.php";

		$db_progetto = new db_progetto();
		$db_associatag = new db_associatag();

		$db_progetto->updateNome($_GET['id'], $_POST['nome']);

		$db_progetto->updateDescrizione($_GET['id'], $_POST['descrizione']);

		$db_progetto->updateData_scadenza($_GET['id'], $_POST['scadenza']);

		$db_associatag->deleteAllTags($_GET['id']);

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

			$array = array("progetto" => $_GET['id'],
				"tag" => $_POST["tag1"],
				"posizione" => "0");

			$db_associatag->register($array);

			$array = array("progetto" => $_GET['id'],
				"tag" => $_POST["tag2"],
				"posizione" => "1");
			$db_associatag->register($array); 

			$array = array("progetto" => $_GET['id'],
				"tag" => $_POST["tag3"],
				"posizione" => "2");
			$db_associatag->register($array); 

			$array = array("progetto" => $_GET['id'],
				"tag" => $_POST["tag4"],
				"posizione" => "3");
			$db_associatag->register($array); 

			$array = array("progetto" => $_GET['id'],
				"tag" => $_POST["tag5"],
				"posizione" => "4");
			$db_associatag->register($array);

			header('Location: progetto.php?id='.$_GET['id']);

	}

	require 'BackEnd/db_progetto.php';

	$db_progetto = new db_progetto();

	$progetto = $db_progetto->setProgetto($_GET['id']);

	require 'BackEnd/db_associatag.php';

	$db_associatag = new db_associatag();

	$tags = $db_associatag->getTag($_GET['id']);

	$string = "";

	foreach ($tags as $value) {
		$string .= $value->getTag().",";
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
		<br>

		<form <?php echo " action=\"Modificaprogetto.php?id=".$_GET['id']."\""; ?> method="POST">
		<table align="center" style="background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;color: white;padding: 20px;">
			<tr>
				<td height="10rem">
					
				</td>
			</tr>
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
				<td height="10rem">
					
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
				<td height="10rem">
					
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
								<input type="date"  class="form-control" id="scadenza" name="scadenza" <?php echo "value=\"".$progetto->getData_scadenza()."\"" ?> 
								<?php
								$date=date_create(date("Y-m-d"));
								echo "min=\"".date_format($date,"Y-m-d")."\" ";
								date_add($date,date_interval_create_from_date_string("1 year"));
								echo "max=\"".date_format($date,"Y-m-d")."\"";
								?>
								 required>
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
				<td width="50rem">
				</td>

				<td align="center">

					Tag

					<br>

					<input type="text" class="form-control" name="tag" data-role="tagsinput" <?php echo"value=\"".$string."\""; ?>/>
					
					<input type="hidden" id="tag1" name="tag1">
					<input type="hidden" id="tag2" name="tag2">
					<input type="hidden" id="tag3" name="tag3">
					<input type="hidden" id="tag4" name="tag4">
					<input type="hidden" id="tag5" name="tag5">

				</td>
				<td width="50rem">
				</td>		
			</tr>
			<tr>
				<td height="25rem">
					
				</td>
			</tr>
			<tr>
				<td width="50rem">
				</td>

				<td align="center">

					<button type="submit" class="btn btn-primary" name="save">Salva</button>
				</td>
				<td width="50rem">
				</td>		
			</tr>
			<tr>
				<td height="10rem">
					
				</td>
			</tr>
		</table>
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

