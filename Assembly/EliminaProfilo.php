<?php

session_start();

$flag = true;

if(empty($_SESSION)) {
    // session isn't started
  header('Location: index.php');
}

if(isset($_POST['hashedPassword'])){
  $password = "";
  $password = $_POST['hashedPassword'];
  require "BackEnd/db_utente.php";

  $utente = new db_utente();

  if($utente->deleteAccount($_SESSION['mail'], $password)) {
    session_destroy();
    header('Location: index.php');
  } else {
    $flag = false;
    echo $password;
  }
}



?>

<title>TeamUp</title>
<link rel="stylesheet" href= "Style.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<script type="text/javascript">
  function hashlogin(){
    document.getElementById("hashedPassword").value = sha256(document.getElementById("password").value);
  }
</script>


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

  <center>
    <form  ACTION="EliminaProfilo.php" METHOD = POST>
      <div class="form-group">
        <table style="background-color: #343a40;background-color: #343a40;box-shadow: 20px 20px 20px 0px #495057;">

          <tr>
            <td height="10rem">

            </td>
          </tr>

          <tr>
            <td colspan="5">
              <div class="titolo" style="text-align: center;">
                Cancella profilo
              </div>
            </td>
          </tr>

          <tr>
            <td height="10rem">

            </td>
          </tr>

          <tr>
            <td width="10rem"></td>
            <td colspan="3">
              <div class="container-fluid">
                <label for="password" style="color: white;">Password</label><br>
                <?php 
                if($flag) {
                  echo "<input type=\"password\"  class=\"form-control\"name=\"password\" id=\"password\" size=\"30\" placeholder=\"Password\">";    
                } else {
                  echo "<input type=\"password\"  class=\"form-control is-invalid\"name=\"password\" id=\"password\" size=\"30\" placeholder=\"Password\">";    
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
            <td colspan="5">
              <div style="text-align: center;">
                <button type="submit" class="btn btn-primary" id="hashedPassword" name="hashedPassword" onclick="hashlogin()">Elimina</button>
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