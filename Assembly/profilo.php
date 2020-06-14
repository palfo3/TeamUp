<?php

session_start();

$link = mysqli_connect('localhost', 'root', '', 'db_ing');

	// Check connection
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM utente WHERE mail ='".$_SESSION['mail']."'";

$link = mysqli_connect('localhost', 'root', '', 'db_ing');

	// Check connection
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$row = mysqli_fetch_assoc($query);



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

<body>


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
									<a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
										<?php

										echo $_SESSION['nome']." ".$_SESSION['cognome'];

										if(isset($_SESSION['img'])){
											echo "<img src=\"".$_SESSION['img']."\" class=\"imgprofile\">";	
										} else {
											echo "<img src=\"Img/profile.png\" class=\"imgprofile\">";
										}

										

										?>
									</a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="#">Profilo</a>
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
	<br>


	<div class="container">
		<div class="row">
			<div class="col-4">
				<?php

				echo $_SESSION['nome']." ".$_SESSION['cognome'];

				?>
				<br>
				<br>
				<br>
				<label for="password">Password</label><br>
				<a href="changepassword.php" class="btn btn-primary">password</a>
				
			</div>
			<div class="col-8">
				<br>
				<br>
				<form>
					<div class="form-group">
						<label for="Nome">Nome</label>
						<input type="text" class="form-control" id="Nome" aria-describedby="Nome">
					</div>
					<div class="form-group">
						<label for="Cognome">Cognome</label>
						<input type="text" class="form-control" id="Cognome">
					</div>
					<div class="form-group">
						<label for="Email">Email</label>
						<input type="email" class="form-control" id="Email">
					</div>
					<div class="form-group">
						<label for="data">Data di nascita</label>
						<input type="date" class="form-control" id="data">
					</div>
					<div class="form-group">
						<label for="descrizione">Descrizione</label>
						<textarea class="form-control" id="descrizione" rows="3" maxlength="255"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Salva</button>
				</form>
			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
	</script>

</body>

</html>
