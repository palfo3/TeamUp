<?php

$mail = "emanuelesala15@gmail.com";

// use wordwrap() if lines are longer than 70 characters

$pass_app = generaStringaRandom(10);
$msg = wordwrap("La password è: ".$pass_app, 70);

// send email
//mail($mail,"My subject", $msg);

function generaStringaRandom($lunghezza) {
    $caratteri = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $stringaRandom = '';
    for ($i = 0; $i < $lunghezza; $i++) {
        $stringaRandom .= $caratteri[rand(0, strlen($caratteri) - 1)];
    }
	return $stringaRandom;
}

require "../BackEnd/db_utente.php";
$utente = new db_utente(); 
$utente->updatePassword($mail, $pass_app);

?>

