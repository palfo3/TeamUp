<?php

require 'db_progetto.php';
$modifica = new progetto($_POST);
$progetto = new db_progetto();
$progetto->setProgetto($_POST['oldID']);


if($progetto->getProgetto()->getRicercabile() != $modifica->getRicercabile())
	$progetto->updateRicercabile($progetto->getProgetto()->getId(), $modifica->getRicercabile());

if($progetto->getProgetto()->getNumero_candidati() != $modifica->getNumero_candidati())
	$progetto->updateNumero_candidati($progetto->getProgetto()->getId(), $modifica->getNumero_candidati());

if($progetto->getProgetto()->getCandidatura() != $modifica->getCandidatura())
	$progetto->updateCandidatura($progetto->getProgetto()->getId(), $modifica->getCandidatura());

if($progetto->getProgetto()->getData_creazione() != $modifica->getData_creazione())
	$progetto->updateData_creazione($progetto->getProgetto()->getId(), $modifica->getData_creazione());

if($progetto->getProgetto()->getData_scadenza() != $modifica->getData_scadenza())
	$progetto->updateData_scadenza($progetto->getProgetto()->getId(), $modifica->getData_scadenza());

if($progetto->getProgetto()->getDescrizione() != $modifica->getDescrizione())
	$progetto->updateDescrizione($progetto->getProgetto()->getId(), $modifica->getDescrizione());

if($progetto->getProgetto()->getNome() != $modifica->getNome())
	$progetto->updateNome($progetto->getProgetto()->getId(), $modifica->getNome());

if($progetto->getProgetto()->getLeader() != $modifica->getLeader())
	$progetto->updateLeader($progetto->getProgetto()->getId(), $modifica->getLeader());

if($progetto->getProgetto()->getId() != $modifica->getId())
	$progetto->updateId($progetto->getProgetto()->getId(), $modifica->getId());

?>