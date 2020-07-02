<?php

if(isset($_POST['si'])){
    header("location: Candidatura.php");
  }else if(isset($_POST['no'])){
    header("location: RicercaProgetto.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	   <center>
           <form  ACTION= "RicercaProgetto.php" METHOD = "POST">

            Vuoi canidarti? <br><br>

            <input  type="submit" align="right" id="no" value="No"> <br><br>

        </form>

            <form  ACTION= "Candidatura.php" METHOD = "POST">

            <input  type="submit" align="right" id="si" value="Si"> <br><br>

        </form>

       </center>
</body>
</html>