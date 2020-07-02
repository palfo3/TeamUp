<?php

require 'db_progetto.php';
$modifica = new progetto($_POST);
$progetto = new db_progetto();
$progetto->setProgetto($_POST['oldID']);


if($progetto->getProgetto()->getData_scadenza() != $modifica->getData_scadenza())
	$progetto->updateData_scadenza($progetto->getProgetto()->getId(), $modifica->getData_scadenza());

if($progetto->getProgetto()->getDescrizione() != $modifica->getDescrizione())
	$progetto->updateDescrizione($progetto->getProgetto()->getId(), $modifica->getDescrizione());

if($progetto->getProgetto()->getNome() != $modifica->getNome())
	$progetto->updateNome($progetto->getProgetto()->getId(), $modifica->getNome());


?>