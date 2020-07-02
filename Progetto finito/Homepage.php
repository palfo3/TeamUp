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


		<div align="center">
			<strong>Benvenuto in Teamup</strong>
			<br>
		</div>

		<br>
		<br>

		<div align="right" style="padding-right: 5rem;">
			<a href="https://www.amazon.it/Apple-AirPods-custodia-ricarica-Modello/dp/B07PYMK77Y?ref_=s9_apbd_otopr_hd_bw_bTTLGx&pf_rd_r=YN1GVZ540G0G21EHWD9N&pf_rd_p=0fbe64fe-af59-550b-9ce2-9f4c7eefb954&pf_rd_s=merchandised-search-11&pf_rd_t=BROWSE&pf_rd_i=435507031"><img style="border: 2px solid #555;" src="https://images-na.ssl-images-amazon.com/images/I/71NTi82uBEL._AC_SL1500_.jpg" height="100rem" width="100rem"></a>

			<br><br>

			<a href="https://www.amazon.it/amazon-echo-dot-3-generazione-altoparlante-intelligente-con-integrazione-alexa-tessuto-antracite/dp/B07PHPXHQS/ref=sr_1_1?__mk_it_IT=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=echo+dot&qid=1593705638&sr=8-1"><img style="border: 2px solid #555;" src="https://images-na.ssl-images-amazon.com/images/I/61u48FEs0rL._AC_SL1000_.jpg" height="100rem" width="100rem"></a>
			<br><br>

			<a href="https://www.amazon.it/SNAPTAIN-Compatibile-Quadricottero-Atterraggio-Principianti/dp/B07Y65S63B/ref=sr_1_1_sspa?__mk_it_IT=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=drone&qid=1593705419&s=electronics&sr=1-1-spons&psc=1&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUEyQ0QxSlBHWVBJNFVHJmVuY3J5cHRlZElkPUEwNDk3MTg4MUczSDdVV1BTMEEwVyZlbmNyeXB0ZWRBZElkPUEwMTA0ODM1M1NUUFFISTg5SlQ5VyZ3aWRnZXROYW1lPXNwX2F0ZiZhY3Rpb249Y2xpY2tSZWRpcmVjdCZkb05vdExvZ0NsaWNrPXRydWU="><img style="border: 2px solid #555;" src="https://images-na.ssl-images-amazon.com/images/I/81QYjjB6ZWL._AC_SL1500_.jpg" height="100rem" width="100rem"></a>
			<br><br>

			<a href="https://www.amazon.it/KAWELL-Applique-Industriale-dellacqua-Ristorante/dp/B078K2ZT6B?pf_rd_r=YGTM4QEEZ58S3GE42MQZ&pf_rd_p=d784cf19-4f23-480a-a82d-a9e87a688e6c&pd_rd_r=940d7695-4227-43d1-a52e-2a8cb9e9e73c&pd_rd_w=jYKqP&pd_rd_wg=Gq9pZ&ref_=pd_gw_trq_rep_sims_gw"><img style="border: 2px solid #555;" src="https://images-na.ssl-images-amazon.com/images/I/71tHYN5wG%2BL._AC_SL1200_.jpg" height="100rem" width="100rem"></a>
		</div>
<br><br><br>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
		</script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
		</script>

	</body>

	</html>

