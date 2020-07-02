<?php

$progetto = $_POST['progetto'];
$mail = $_POST['mail'];

require 'db_candidato.php';
$candidato = new db_candidato();
$candidato->updateAccettato($mail, $progetto, 1);

?>